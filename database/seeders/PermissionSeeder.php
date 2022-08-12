<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

         // User permissions
         Permission::create(['name' => 'user-list']);
         Permission::create(['name' => 'user-create']);
         Permission::create(['name' => 'user-edit']);
         Permission::create(['name' => 'user-delete']);

        // visit permissions
        Permission::create(['name' => 'visit-list']);
        Permission::create(['name' => 'visit-create']);
        Permission::create(['name' => 'visit-edit']);
        Permission::create(['name' => 'visit-delete']);
        Permission::create(['name' => 'visit-show']);

          // Role permissions
          Permission::create(['name' => 'role-list']);
          Permission::create(['name' => 'role-create']);
          Permission::create(['name' => 'role-edit']);
          Permission::create(['name' => 'role-delete']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Visit-Manager']);
        $role1->givePermissionTo('visit-list');
        $role1->givePermissionTo('visit-create');
        $role1->givePermissionTo('visit-edit');
        $role1->givePermissionTo('visit-delete');
        $role1->givePermissionTo('visit-show');

        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('role-list');
        $role2->givePermissionTo('role-create');
        $role2->givePermissionTo('role-edit');
        $role2->givePermissionTo('role-delete');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password'=>bcrypt('test1234'),
        ]);
        $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Visit Manager',
            'email' => 'vistmanager@gmail.com',
            'password'=>bcrypt('test1234'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'adminuser@gmail.com',
            'password'=>bcrypt('test1234'),
        ]);
        $user->assignRole($role2);
    }
}
