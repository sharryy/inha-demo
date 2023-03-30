<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\TaskStatus;
use App\Models\UserTask;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TaskStatus>
 */
class TaskStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_task_id' => UserTask::inRandomOrder()->first()->id,
            'status_id'    => Status::inRandomOrder()->first()->id,
        ];
    }
}
