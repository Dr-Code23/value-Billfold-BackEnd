<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Exception;
use Carbon\Carbon;
use URL;
use DB;
use Illuminate\Support\Str;
use App\Mail\PasswordResetSend;
use App\Models\PasswordResets;
use Hash;
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
    public function register(UserRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $user->notify(new EmailVerificationNotification());
        return Response::json(['status'=>true,'message'=> 'successfully Register'],200);
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
            'email' => ['required', Rule::unique('users')->ignore($userID)]
        ]);
        if($validator->fails()){
            return Response::json(['status'=>false,'message'=> $validator->errors()],400);
        }
        User::whereId($userID)->update([
            'name' => $request->name,
            'email' =>$request->email
        ]);
        return Response::json(['status'=>200,'message'=>'profile changed Successfully'],200);
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
    public function EmailVerificationSend(){
        $user = auth('api')->user();
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
    }
}
