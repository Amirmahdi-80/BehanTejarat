<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions =[
            'edit-users',
            'Role',
            'edit-products',
            'edit-orders',
            'Cars',
            'edit-cars',
            'edit-cost',
            'edit-slides',
            'Soal',
            'edit-favorite',
            'edit-aboutme',
            'TrueLock'
        ];
        foreach ($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
