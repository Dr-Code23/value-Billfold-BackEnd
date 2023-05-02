<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JoinRoom;
use DB;


class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $admin = auth('admin')->user();
        $notifications = DB::table('notifications')->orderBy('id', 'DESC')->take(4)->get();
        return view("admin.users.user_list",compact('users','admin','notifications'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function autocomplete(Request $request){
        $data = [];
    $data = User::select("name","email")
                    ->where('name', 'LIKE', '%'. $request->get('query'). '%')
                    ->pluck('name');

        return response()->json($data);
    }

    public function updateStatus($user_id,$status_code){
        $user = User::whereId($user_id)->update([
            'is_active' => $status_code
        ]);

        if($user){
            return redirect(url('Admin/users'))->withsuccess('status is updated successfully');
        }
        return redirect(url('Admin/users'))->witherror('sorry,there is an error');
    }

    public function delete($user_id){
        $user = User::whereId($user_id)->first();
        if($user){
            $invoices = $user->invoices;
            foreach ($invoices as $invoice){
                $invoice->delete();
            }
            $userLook = $user->Looks;
            if ($userLook->count() > 0){
                foreach ($userLook as $look){
                    $look->delete();
                }
            }
            $user->delete();
            return redirect(url('Admin/users'))->withsuccess('User is deleted successfully');
        }
        return redirect(url('Admin/users'))->witherror('sorry,there is an error');
    }

    public function moreDetails($id){
        $admin = auth('admin')->user();
        $user = User::whereId($id)->first();
        if(isset($user)&&$user->count()>0){
            $joinRoom = JoinRoom::where('user_id',$user->id)->count();
            $followers = $user->follower()->count();
            $following = $user->following()->count();
            $friends = $user->friends;
            $friCount= $friends->count();
            $Clans = $user->Clan;
            if(!empty($Clans)){
                $userClan = $Clans->name;
            }else{
                $userClan = 'Not inside Clan';
            }
            $userBadges = $user->badges;
            $userMusic = $user->Musics->count();
            $userBackgrounds = $user->Backgrounds()->where('type',1)->get();
            $totalpriceBackground = 0.0;
            foreach($userBackgrounds as $userBackground){
                $totalpriceBackground += $userBackground->price;
            }
            $totalPrice = 0 ;
            foreach($userBadges as $userBadge){
                $totalPrice += $userBadge->price;
            }
            return view('admin.users.deatils',compact('admin','user','joinRoom','followers','following','friCount','totalPrice','userBadges','userClan','totalpriceBackground','userBackgrounds','userMusic'));
        }else{
            return view('errors.404');
        }

    }
}
