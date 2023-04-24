<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Auth;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Invoice;
use DB;


class AuthController extends Controller
{
    public function home(){
        $admin = auth('admin')->user();
        $notifications = DB::table('notifications')->orderBy('id', 'DESC')->take(4)->get();
        $user = User::count();
        $admins = Admin::count();
        $invoices = Invoice::count();
        $activateUser = User::where('is_active','1')->count();
        return view("admin.home",compact('admin','notifications','user','admins','invoices','activateUser'));
    }

    public function getlogin(){
        return view("admin.Auth.login");
    }
    public function login(Request $request){
        $credentials = request(['email', 'password']);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('Dashboard')->with('success','You are Logged in sucessfully.');
        }else{
            return redirect()->route("login")->with('error','Whoops! invalid email and password.');
        }
    }
    public function logout()
    {
        Session::flush();

        Auth::guard('admin')->logout();
        return Redirect(route('login'));
    }
}
