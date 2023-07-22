<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('comics');
        Storage::deleteDirectory('comic_portada');
        Storage::deleteDirectory('chapters');

        Storage::makeDirectory('comics');
        Storage::makeDirectory('comic_portada');
        Storage::makeDirectory('chapters');
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(CategorySeeder::class);
        //$this->call(PlanSeeder::class);
        //$this->call(MoneySeeder::class);
        $this->call(ComicSeeder::class);
    }
}
