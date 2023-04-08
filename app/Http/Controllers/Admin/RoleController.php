<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use App\Repositories\Interfaces\RolesRepositoryInterface;

class RoleController extends Controller
{
    private $RoleRepository;


    public function __construct(RolesRepositoryInterface $RoleRepository){
        return $this->RoleRepository = $RoleRepository;
    }

    public function index(){
        $admin = auth('admin')->user();
        $notifications = $this->RoleRepository->getnotifcation(); //all of notification
        $Roles = $this->RoleRepository->allRoles();

        return view("admin.Roles.index",compact('Roles','admin','notifications'));
    }
    public function create(){
        $admin = $this->RoleRepository->createRoles();
        return view('admin.Roles.create',compact('admin'));
    }
    public function store(RolesRequest $data){
        $this->RoleRepository->storeRoles($data->all());
        return redirect(url('Admin/Role'))->withsuccess("the Role is add successfully");
    }

    public function edit($id){
        $admin = $this->RoleRepository->getadmin();
        $notifications = $this->RoleRepository->getnotifcation(); //all of notification
        $Role = $this->RoleRepository->editRoles($id);
        return view('admin.Roles.edit',compact('admin','Role','notifications'));
    }

    public function update(RolesRequest $data , $id){
        $this->RoleRepository->updateRoles($data->all(),$id);
        return redirect(url('Admin/Role'))->withsuccess("the Role is updated successfully");
    }
    public function delete($id){
        $this->RoleRepository->deleteRoles($id);
        return redirect(url('Admin/Role'))->withsuccess("the Role is deleted successfully");
    }

}
