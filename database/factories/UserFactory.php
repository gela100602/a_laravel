<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
            'suffix_name' => fake()->suffix(),
            'birth_date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'gender_id' => fake()->numberBetween($min = 1, $max = 3),
            'address' => fake()->streetAddress(),
            'contact_number' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'username' => fake()->userName(),
            'password' => static::$password ??= Hash::make ('password')
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
