<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'title' => fake()->title(),
            'body' => fake()->paragraph(),
            'send_date' => fake()->dateTime(),
            'is_published' => fake()->boolean,
            'heart_count' => fake()->randomNumber(),
        ];
    }
}
