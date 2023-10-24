<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'control-panel',
            'operations-on-users',
            'create-user',
            'edit-user',
            'delete-user',
            'show-user',
            'mail-user',
            'operations-on-roles',
            'show-role',
            'role-create',
            'role-edit',
            'role-delete',
            'product-create',
            'product-edit',
            'product-delete'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
