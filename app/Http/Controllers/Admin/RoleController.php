<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RolesRequest;
use App\Repositories\Interfaces\RolesRepositoryInterface;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    private $RoleRepository;


    public function __construct(RolesRepositoryInterface $RoleRepository){
//         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
//         $this->middleware('permission:role-create', ['only' => ['create','store']]);
//         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
        return $this->RoleRepository = $RoleRepository;

    }

    public function index(){
        $admin = auth('admin')->user();
        $notifications = $this->RoleRepository->getnotifcation(); //all of notification
        $Roles = $this->RoleRepository->allRoles();

        return view("admin.Roles.index",compact('Roles','admin','notifications'));
    }
    public function create(){
        $permissions = $this->RoleRepository->createRoles();
        $admin = auth('admin')->user();
        $notifications = $this->RoleRepository->getnotifcation(); //all of notification
        return view('admin.Roles.create',compact('admin','notifications','permissions'));
    }
    public function store(RolesRequest $data){
        // return $data['permission'];
        $this->RoleRepository->storeRoles($data->all());
        return redirect(url('Admin/Role'))->withsuccess("the Role is add successfully");
    }

    public function edit($id){
        $admin = $this->RoleRepository->getadmin();
        $notifications = $this->RoleRepository->getnotifcation(); //all of notification
        $Roles = $this->RoleRepository->editRoles($id);
        $Role = $Roles['role'];
        $permission = $Roles['permission'];
        $rolePermissions = $Roles['rolePermissions'];
        return view('admin.Roles.edit',compact('admin','Role','notifications','permission','rolePermissions'));
    }

    public function update(Request $data , $id){
        $validator = Validator::make($data->all(), [
            'name' => 'required',
        ]);
        $this->RoleRepository->updateRoles($data->all(),$id);
        return redirect(url('Admin/Role'))->withsuccess("the Role is updated successfully");
    }
    public function delete($id){
        $this->RoleRepository->deleteRoles($id);
        return redirect(url('Admin/Role'))->withsuccess("the Role is deleted successfully");
    }

}
