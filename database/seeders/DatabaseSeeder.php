<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Status;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use App\Models\UserTask;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Type\Time;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();

        Task::factory()->count(2)->create();

        UserTask::factory()->count(2)->create();

        Status::factory()->completed()->create();
        Status::factory()->todo()->create();
        Status::factory()->onHold()->create();

        TaskStatus::factory()->create();
        sleep(1);
        TaskStatus::factory()->create();
        sleep(1);
        TaskStatus::factory()->create();
        sleep(1);
        TaskStatus::factory()->create();
        sleep(1);
        TaskStatus::factory()->create();
    }
}
