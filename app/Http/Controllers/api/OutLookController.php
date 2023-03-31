<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserLock;
use Illuminate\Support\Facades\Response;
class OutLookController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|max:4|min:4',
        ]);
        if($validator->fails()){
            return Response::json(['status'=>false,'message'=> $validator->errors()],400);
        }
        $userlook = UserLock::where('user_id',auth('api')->user()->id)->first();
        if(isset($userlook)){
            $userlook->update([
                'code' => $request->code
            ]);
            return Response::json(['status'=>true,'message'=>'your code is updated ,successfully'],200);
        }else{
            $look = UserLock::create([
                'code' => $request->code,
                'user_id' => auth('api')->user()->id
            ]);
            return Response::json(['status'=>true,'message'=>'your code is created ,successfully'],200);
        }
    }

    public function checkCode(Request $request){
        $userlook = UserLock::where('user_id',auth('api')->user()->id)->first();
        if(isset($userlook)){
            if($userlook->code == $request->code){
                return Response::json(['status'=>true,'message'=>'your code is correct'],200);
            }else{
                return Response::json(['status'=>true,'message'=>'your code is failed ,tryAgain'],200);
            }
        }else{
            return Response::json(['status'=>true,'message'=>'sorry , you not have Look'],200);
        }
    }
}
