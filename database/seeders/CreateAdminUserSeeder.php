<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = User::create([
            'name' => 'GatePassAdmin', 
            'email' => 'admin@gatepass.com',
            'username'=>'Admin',
            'department' => 'GatePassAdmin',
            'password' => bcrypt('12345678')
        ]);
    
        // $roleAdmin = Role::create(['name' => 'Admin']);
        
        // $permissionsAdmin = Permission::pluck('id','id')->all();
        
        // $roleAdmin->syncPermissions($permissionsAdmin);
        
        // $userAdmin->assignRole([$roleAdmin->id]);
        
        // $roleStaff = Role::create(['name' => 'Staff']);

        // $permissionsStaff = Permission::pluck('id','id')->all();

        // $roleStaff->syncPermissions($permissionsStaff);

        // $roleReceptionist = Role::create(['name' => 'Receptionist']);

        // $permissionsReceptionist = Permission::pluck('id','id')->all();

        // $roleReceptionist->syncPermissions($permissionsReceptionist);
    }
}