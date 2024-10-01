<?php

namespace Database\Factories;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{

    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'feature_image' => fake()->imageUrl(),
            'title' => fake()->title(),
            'user_id' => User::factory(),
            'description' => fake()->paragraph(),
            'slug' => fake()->slug(),
            'roles' => fake()->paragraph(),
            'job_type' => fake()->randomElement(['part time', 'full time']),
            'experience' => fake()->numberBetween(1, 4),
            'other_benifits' => fake()->paragraph(),
            'vacancy' => fake()->numberBetween(1, 4),
            'company' => fake()->company(),
            'gender' => fake()->randomElement(['male', 'female']),
            'education_experience' => fake()->paragraph(),
            'job_region' => fake()->country(),
            'application_close_date' => fake()->dateTimeBetween('now', '+1 year'),
            'salary' => fake()->numberBetween(15000, 20000)
        ];
    }

    public function admin(): static
    {
        return $this->state(fn(array $attributes) => [
            'user_id' => null,
        ]);
    }
}
