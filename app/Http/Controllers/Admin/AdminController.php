<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\AdminsRepositoryInterface;
use App\Http\Requests\AdminRequest;
use App\Models\Notification;
use DB;


class AdminController extends Controller
{
    private $AdminsRepository;


    public function __construct(AdminsRepositoryInterface $AdminsRepository){
        return $this->AdminsRepository = $AdminsRepository;
    }

    public function index(){
        $Admins = $this->AdminsRepository->getAdmins();
        $admin = $this->AdminsRepository->getadmin(); //auth of admin
        $notifications = $this->AdminsRepository->getnotifcation(); //all of notification
        return view('admin.admins.index',compact('Admins','admin','notifications'));
    }
    public function create(){
        $Roles = $this->AdminsRepository->createAdmins();
        $admin = $this->AdminsRepository->getadmin(); //auth of admin
        $notifications = $this->AdminsRepository->getnotifcation(); //all of notification
        return view('admin.admins.create',compact('Roles','admin','notifications'));
    }

    public function store(AdminRequest $data){
        $this->AdminsRepository->storeAdmins($data->all());

        return redirect(url('Admin'))->withsuccess("the Admin is add successfully");
    }


    public function edit($id){
        $admin = $this->AdminsRepository->getadmin();
        $notifications = $this->AdminsRepository->getnotifcation(); //all of notification
        $Roles = $this->AdminsRepository->createAdmins();
        $admins = $this->AdminsRepository->editAdmins($id);
        return view('admin.admins.edit',compact('admin','admins','Roles','notifications'));
    }

    public function update(AdminRequest $data , $id){
        $this->AdminsRepository->updateAdmins($data->all(),$id);
        return redirect(url('Admin'))->withsuccess("the Admin is updated successfully");
    }
    public function delete($id){
        $this->AdminsRepository->deleteAdmins($id);
        return redirect(url('Admin'))->withsuccess("the Admin is deleted successfully");
    }

    public function profile(){
        $admin = $this->AdminsRepository->getadmin();
        $notifications = $this->AdminsRepository->getnotifcation(); //all of notification
        $myinfo = $this->AdminsRepository->profile();

        return view('admin.admins.profile',compact('admin','myinfo','notifications'));
    }

    public function changeLange($lang){
        if(in_array($lang,['ar','en'])){
            session()->put('lang',$lang);
        }else{
            session()->put('lang','en');
        }
        return back();
    }

    public function editprofile(Request $data , $id){
        $this->AdminsRepository->editprofile($data->all(),$id);
        return redirect(url('Admin/profile'))->withsuccess("the information is updated successfully");
    }
    public function editImage(Request $data , $id){
        $this->AdminsRepository->editImage($data->all(),$id);
        return redirect(url('Admin/profile'))->withsuccess("the image is updated successfully");
    }

    public function allNotification(){
        $notifications = $this->AdminsRepository->getnotifcation(); //all of notification
        $admin = $this->AdminsRepository->getadmin(); //auth of admin
        $AllNotification = DB::table('notifications')->orderBy('id', 'DESC')->get();
        return view("admin.Notification.notification_list",compact('notifications','admin','AllNotification'));
    }

}
