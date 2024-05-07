<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developer = Role::create([
            'name' => 'Developer'
        ]);

        $admin = Role::create([
            'name' => 'admin'
        ]);
        $Herasat = Role::create([
            'name' => 'Herasat'
        ]);

        $developer->givePermissionTo(Permission::all());
        $admin->givePermissionTo([
            'Role',
            'edit-products',
            'edit-orders',
            'Cars',
            'edit-cars',
            'edit-cost'
        ]);
        $Herasat->givePermissionTo([
            'Cars',
            'Role',
        ]);
    }
}
