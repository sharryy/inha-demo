<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'              => User::inRandomOrder()->first()->id,
            'name'                 => $this->faker->sentence,
            'snippet'              => $this->faker->sentence,
            'description'          => $this->faker->sentence,
            'reason_for_happiness' => $this->faker->sentence,
            'steps'                => $this->faker->sentence,
            'banner_url'           => $this->faker->imageUrl(1920, 1080, 'nature', true, 'Faker'),
            'seo'                  => json_encode([
                'title'       => $this->faker->sentence,
                'description' => $this->faker->paragraph,
                'keywords'    => $this->faker->words(5, true),
            ]),
            'points'               => $this->faker->numberBetween(1, 100),
            'impact'               => $this->faker->numberBetween(1, 5),
        ];
    }
}
