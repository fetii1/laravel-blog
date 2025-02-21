<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RolesAndPermissionsSeeder::class,
            TagSeeder::class,
            ProfileSeeder::class,
            PostSeeder::class,
            ImageSeeder::class,
        ]);
    }
}


