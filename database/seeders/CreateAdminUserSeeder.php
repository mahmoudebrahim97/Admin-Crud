<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder

{
    public function run()
    {
        $user = User::create([
            'name' => 'Admin 1',
            'email' => 'a@gmail.com',
            'password' => 123456,
            'role_name' => ['admin'],
            'status' => 'active',
            'country' => 'egypt',

        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
