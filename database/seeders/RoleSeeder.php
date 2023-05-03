<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creator = Role::create(['name' => 'Creador']); // 1
        $creator->permissions()->attach([1, 2, 3, 4]);
        $admin = Role::create(['name' => 'Administrador']); // 2
        $admin->permissions()->attach([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]);
    }
}
