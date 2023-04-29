<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'Role-List',
            'Role-Create',
            'Role-Edit',
            'Role-Delete',
            'User-List',
            'User-Create',
            'User-Edit',
            'User-Delete',
            'Admin-List',
            'Admin-Create',
            'Admin-Edit',
            'Admin-Delete',
            'AllNotification',
            "ShowProfile",
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name' => 'admin']);
        }
    }
}
