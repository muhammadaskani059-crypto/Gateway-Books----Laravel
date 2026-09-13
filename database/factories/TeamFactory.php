<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => fake()->name,
            'designation' => fake()->jobTitle,
            'telephone' => fake()->phoneNumber,
            'mobile' => fake()->e164PhoneNumber,
            'email' => fake()->unique()->safeEmail,
            'facebook_id' => fake()->unique()->freeEmail,
            'twitter_id' => fake()->unique()->freeEmail,
            'pinterest_id' => fake()->unique()->freeEmail,
            'profile' => fake()->paragraph,
            'team_img' => 'No image found',
            'status' => fake()->randomElement(['DEACTIVE','ACTIVE'])
        ];
    }
}
