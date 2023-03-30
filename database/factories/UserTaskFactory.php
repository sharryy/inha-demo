<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\UserTask;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UserTask>
 */
class UserTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $task = Task::inRandomOrder()->first();

        return [
            'task_id'              => $task->id,
            'user_id'              => User::inRandomOrder()->first()->id,
            'name'                 => $task->name,
            'snippet'              => $task->snippet,
            'description'          => $task->description,
            'reason_for_happiness' => $task->reason_for_happiness,
            'steps'                => $task->steps,
            'banner_url'           => $task->banner_url,
            'impact'               => $task->impact,
        ];
    }
}
