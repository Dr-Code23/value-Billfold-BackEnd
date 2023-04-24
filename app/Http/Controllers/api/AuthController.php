<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Exception;
use Carbon\Carbon;
use URL;
use DB;
use Illuminate\Support\Str;
use App\Mail\PasswordResetSend;
use App\Models\PasswordResets;
use Hash;
use App\Events\ApprovedNotify;
use Otp;
use Illuminate\Validation\Rule;
use App\Notifications\EmailVerificationNotification;
class AuthController extends Controller
{

    private $otp;

    public function __construct()
    {
        $this->otp = new Otp;
    }
    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'device_token' => $request->device_token,
        ]);
        event(new ApprovedNotify($user));
        $user->notify(new EmailVerificationNotification());
        return Response::json(['status'=>true,'message'=> 'successfully Register , waiting to Accepting'],200);
    }

    public function login(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if($validator->fails()){
                return Response::json(['status'=>false,'message'=> $validator->errors()],400);
            }
            $credentials = request(['email', 'password']);
            if ($token = auth()->guard('api')->attempt($credentials)) {
                $user = auth()->guard('api')->user();
                $user['token'] = [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60
                ];
                return Response::json(['status'=>true,'data'=>$user],200);
            }else{
                return Response::json(['status'=>false,'message'=> 'Email and Password are Wrong.'],400);
            }
        }catch (Exception $e){
            return Response::json(['status'=>false,'message'=>'Server Error','error'=>$e->getMessage()],500);
        }
    }

    public function ForgetPasswordUser(Request $request){
        $user = User::where("email",$request->email)->get();
        if(isset($user)&& $user->count() > 0){
            $token = Str::random(40);
            $requestData['token'] = $token;
            $requestData['email'] = $request->email;
            Mail::to($requestData['email'])->send(new PasswordResetSend($requestData));
            $datetime = Carbon::now()->format('Y-m-d');
            PasswordResets::updateOrCreate([
                'email' => $request->email
            ],[
                'email' => $request->email,
                'token' => $token,
                'created_at' => $datetime
            ]);
            return Response::json(['status'=>200,'message'=>'check your email to RestPassword'],200);
        }else{
            return Response::json(['status'=>false,'message'=>"sorry,No user of this email"],404);
        }
    }

    public function reset_password(Request $request, $token){
        $checkData = PasswordResets::where('email',$request->email)->where('token',$token)->count();
        $email = $request->email;
            if($checkData > 0 ){
                return view("users.Auth.confirmpassword",compact('email'));
            }else{
                return Response::json(['status'=>false,'message'=>"sorry,there is an error"],404);
            }
    }

    public function confirm_password(Request $request){
        $validated = Validator::make($request->all(),[
            "password" => "required|max:20|min:8",
            "password_confirm" => "required|same:password|min:8",
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated)->withInput($request->all());
        }
        $user = User::where('email',$request->email)->update(["password" => bcrypt($request->password)]);

        $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

                if($isMob){
                    header('Location:intent://ranachat.mobile.erp-everest.com/#Intent;scheme=https;package=com.doctorcode.ranachat.rana_chat;end' );
                        die();
                    }else{
                    return 'Using Desktop...';
                }
    }

    public function ChangePassword(Request $request){
        $user = auth('api')->user();
        $userID = $user->id;
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ]);
        if($validator->fails()){
            return Response::json(['status'=>false,'message'=> $validator->errors()],400);
        }

        #Match The Old Password
        if(!Hash::check($request->old_password,$user->password)){
            return Response::json(['status'=>false,'message'=>'sorry,old Password Doesn\'t Correct !! '],400);
        }
        User::whereId($userID)->update([
            'password' => Hash::make($request->password)
        ]);
        return Response::json(['status'=>200,'message'=>'password changed Successfully'],200);
    }

    public function editProfile(Request $request){
        $user = auth('api')->user();
        $userID = $user->id;
         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => ['required', Rule::unique('users')->ignore($userID)],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validator->fails()){
            return Response::json(['status'=>false,'message'=> $validator->errors()],400);
        }
        if($user->avatar == "default.jpg"){
            $filename = '';
            $filename = uploadImage("avatar",$request->avatar);
            User::whereId($userID)->update([
                'name' => $request->name,
                'email' =>$request->email,
                'avatar' => $filename
            ]);
            return Response::json(['status'=>200,'message'=>'profile changed Successfully'],200);
        }else{

            $fileInfo = pathinfo($user->avatar);

            if(isset($request->avatar)){
                $file_path = public_path("\\img\\avatar\\" . $fileInfo['basename']);
                if(File::exists($file_path)) {
                    unlink($file_path);
                }
            $filename = '';
            $filename = uploadImage("avatar",$request->avatar);
            $request->avatar = $filename;
            User::whereId($userID)->update([
                'name' => $request->name,
                'email' =>$request->email,
                'avatar' => $filename
            ]);
            return Response::json(['status'=>200,'message'=>'profile changed Successfully'],200);
        }else{

            User::whereId($userID)->update([
                'name' => $request->name,
                'email' =>$request->email
            ]);
            return Response::json(['status'=>200,'message'=>'profile changed Successfully'],200);
            }
        }
    }

    public function EmailVerification(EmailVerificationRequest $request){
        $otp2 = $this->otp->validate($request->email,$request->code);

        if(!$otp2->status){
            return Response::json(['status'=>false,'message'=> $otp2],400);
        }
        $user = User::where('email',$request->email)->update([
            "email_verified_at" => now()
        ]);
        return Response::json(['status'=>200,'message'=>'Email Verified Successfully'],200);
    }
    public function EmailVerificationSend(Request $request){
        $user = User::where('email',$request->email)->first();
        if(isset($user)){
            if($user->email_verified_at != NULL){
                return Response::json(['status'=>false,'message'=> 'sorry your email is verified alreday'],400);
            }else{
                $identifier = DB::table('otps')->where('identifier',$user->email)->count();
                // return $identifier;
                if( $identifier > 0){
                    $myid = DB::table('otps')->where('identifier',$user->email)->delete();
                    $user->notify(new EmailVerificationNotification());
                    return Response::json(['status'=>200,'message'=>'check your email to verify'],200);
                }else{
                    $user->notify(new EmailVerificationNotification());
                    return Response::json(['status'=>200,'message'=>'check your email to verify'],200);
                }
            }
        }else{
            return Response::json(['status'=>false,'message'=> 'sorry your email is not  match for user'],400);
        }
    }
    public function showProfile(){
        $user = auth('api')->user();
        if(isset($user)){
            return Response::json(['status'=>200,'message'=>$user],200);
        }else{
            return Response::json(['status'=>false,'message'=> 'sorry your user is not  exit'],400);
        }
    }

    public function home(){
        $user = auth('api')->user();
        $invoice_paid = Invoice::where("status_value" , '1')->where('user_id',$user->id)->count();
        $invoice_due = Invoice::where("status_value" , '0')->where('user_id',$user->id)->orderBy('id', 'DESC')->take(3)->get();
        $invoice_dueCount = Invoice::where("status_value" , '0')->where('user_id',$user->id)->count();
            $paidTotal= 0.0;
        $invoice_paidTotal = Invoice::where("status_value" , '1')->where('user_id',$user->id)->get();
        if(isset($invoice_paidTotal)){
            foreach ($invoice_paidTotal as $item){
                $paidTotal = $paidTotal + $item->amount;
            }
        }
        $dueTotal=0.0;
        $invoice_dueTotal = Invoice::where("status_value" , '0')->where('user_id',$user->id)->get();
        if (isset($invoice_dueTotal)){
            foreach ($invoice_dueTotal as $item){
                $dueTotal = $dueTotal + $item->amount;
            }
        }
        return Response::json(['status'=>200,'invoice_paidCount'=>$invoice_paid,'invoice_due' => $invoice_due,'invoice_dueCount' => $invoice_dueCount,'paidTotal' => $paidTotal,'dueTotal'=>$dueTotal],200);

    }
}
