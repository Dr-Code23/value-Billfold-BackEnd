<?php


namespace App\Repositories;
use App\Repositories\Interfaces\RolesRepositoryInterface;
use App\Models\Role;
use DB;

class RolesRepository implements RolesRepositoryInterface{

    // methods always return admin
    public function getadmin(){
        return  auth('admin')->user();
    }
    public function allRoles(){
        return Role::all();
    }

    public function createRoles(){
        return  auth('admin')->user();
    }

    public function storeRoles($data){
        return Role::create([
            'name' => $data['name'],
            'permissions' => json_encode($data['permissions'])
        ]);
    }

    public function editRoles($id){
        return Role::find($id);
    }

    public function updateRoles($data,$id){
        $role = Role::find($id);
        $role->name = $data['name'];
        $role->permissions = json_encode($data['permissions']);
        $role->save();
    }

    public function deleteRoles($id){
        $role = Role::find($id);
        $role->delete();
    }

    public function getnotifcation(){
        return DB::table('notifications')->orderBy('id', 'DESC')->take(4)->get();
    }
}
