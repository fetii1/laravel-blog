<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        \App\Models\User::all()->each(function (\App\Models\User $user): void {
            $user->posts()->saveMany(
                \App\Models\Post::factory(5)->make()
            );
        });
    }
}
