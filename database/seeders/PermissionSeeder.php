<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Crear Comic (creador)']); // 1
        Permission::create(['name' => 'Editar Comic (creador)']); // 2
        Permission::create(['name' => 'Eliminar Comic (creador)']); // 3
        Permission::create(['name' => 'Listar Comic (creador)']); // 4
        Permission::create(['name' => 'Ver Dashboard (administrador)']); // 5
        Permission::create(['name' => 'Crear Role (administrador)']); // 6
        Permission::create(['name' => 'Editar Role (administrador)']); // 7
        Permission::create(['name' => 'Eliminar Role (administrador)']); // 8
        Permission::create(['name' => 'Listar Role (administrador)']); // 9
        Permission::create(['name' => 'Crear Usuario (administrador)']); // 10
        Permission::create(['name' => 'Listar Usuario (administrador)']); // 11
        Permission::create(['name' => 'Banear Usuario (administrador)']); // 12
        Permission::create(['name' => 'Editar Usuario (administrador)']); // 13
        Permission::create(['name' => 'Revisar Comic (administrador)']); // 14
    }
}
