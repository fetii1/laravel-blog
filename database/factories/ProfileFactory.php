<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition(): array
    {
        return [
            'bio' => $this->faker->paragraph(),
            'website' => $this->faker->url(),
            'twitter' => $this->faker->userName(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
