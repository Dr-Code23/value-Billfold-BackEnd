<?php


namespace App\Repositories;
use App\Repositories\Interfaces\RolesRepositoryInterface;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesRepository implements RolesRepositoryInterface{

    // methods always return admin
    public function getadmin(){
        return  auth('admin')->user();
    }
    public function allRoles(){
        return Role::orderBy('id','DESC')->get();
    }

    public function createRoles(){
       return Permission::get();
    }

    public function storeRoles($data){
        // return Role::create([
        //     'name' => $data['name'],
        //     'permissions' => json_encode($data['permissions'])
        // ]);

        $role = Role::create(['name' => $data['name'],'guard_name' => 'admin']);
        $role->syncPermissions($data['permission']);
    }

    public function editRoles($id){
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return ['role' => $role , 'permission' => $permission , 'rolePermissions' => $rolePermissions];
    }

    public function updateRoles($data,$id){
        $role = Role::find($id);
        $role->name = $data['name'];
        $role->save();
        $role->syncPermissions($data['permission']);
    }

    public function deleteRoles($id){
        $role = Role::find($id);
        $role->delete();
    }

    public function getnotifcation(){
        return DB::table('notifications')->orderBy('id', 'DESC')->take(4)->get();
    }
}
