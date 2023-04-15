<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        $admin = Admin::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('77777777'),
            'image' => 'default.jpg',
            'roles_name' => 'supervisior',
        ]);

        $role = Role::create(['name' => 'supervisior','guard_name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);
    }
}
