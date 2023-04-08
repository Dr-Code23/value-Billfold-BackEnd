<?php


namespace App\Repositories;
use App\Repositories\Interfaces\AdminsRepositoryInterface;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\File;
use DB;

class AdminsRepository implements AdminsRepositoryInterface{
      // methods always return auth of admin
    public function getadmin(){
        return  auth('admin')->user();
    }

    public function getAdmins(){
        return Admin::latest()->where('id','<>',auth('admin')->user()->id)->get();
    }
    public function createAdmins(){
        return Role::all();
    }

    public function storeAdmins($data){
        $filename = '';
        $filename = uploadImage("admins",$data['image']);

        $admins = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role_id' => $data['role_id'],
            'image' => $filename
        ]);
    }

public function editAdmins($id){
    return Admin::find($id);
}

public function updateAdmins($data,$id){
    $admin = Admin::find($id);
    $fileInfo = pathinfo($admin['image']);

    if(isset($data['image'])){
        $file_path = public_path("\\img\\admins\\" . $fileInfo['basename']);
        if(File::exists($file_path)) {
            unlink($file_path);
        }
    $filename = '';
    $filename = uploadImage("admins",$data['image']);
    $data['image'] = $filename;
    $admin->update($data);
}else{
    $admin->name = $data['name'];
    $admin->email= $data['email'];
    $admin->role_id = $data['role_id'];
    $admin->save();
    }

}

public function deleteAdmins($id){
    $admin = Admin::find($id);

    $admin->delete();
}

public function profile(){
    return auth('admin')->user();
}
public function editImage($data,$id){
    $admin = Admin::find($id);
    $fileInfo = pathinfo($admin['image']);
    if(isset($data['image'])){
        $file_path = public_path("\\img\\admins\\" . $fileInfo['basename']);
        if(File::exists($file_path)) {
            unlink($file_path);
        }
    $filename = '';
    $filename = uploadImage("admins",$data['image']);
    $data['image'] = $filename;
    $admin->update($data);
    }
}

public function editprofile($data , $id){
    $admin = Admin::find($id);
    $admin->name = $data['name'];
    $admin->email= $data['email'];
    $admin->save();
}
public function getnotifcation(){
    return DB::table('notifications')->orderBy('id', 'DESC')->take(4)->get();
}

}
