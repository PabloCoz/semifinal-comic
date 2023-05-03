<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'Pablo7',
            'password' => bcrypt('password'),
            'slug' => Str::slug('Pablo7'),
        ]);

        $user->assignRole('Administrador');

        User::factory(10)->create();
    }
}
