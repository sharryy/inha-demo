<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Status>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

        ];
    }

    /*
     * Indicate that the task is completed.
     */
    public function completed(): StatusFactory
    {
        return $this->state(fn() => [
            'name' => 'Completed',
        ]);
    }

    /*
     * Indicate that the task is in progress.
     */
    public function todo(): StatusFactory
    {
        return $this->state(fn() => [
            'name' => 'Todo',
        ]);
    }

    /*
     * Indicate that the task is on hold.
     */
    public function onHold(): StatusFactory
    {
        return $this->state(fn() => [
            'name' => 'On-Hold',
        ]);
    }
}
