<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'logo' => null,
//            'logo' => fake()->image(public_path('logos'), 400,400, null, false),
//            'logo' => fake()->image(storage_path('logos'), 400,400, null, false),
            'website' => fake()->unique()->url(),
        ];
    }
}
