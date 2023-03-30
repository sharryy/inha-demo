<?php

use App\Models\Status;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\UserTask;
use App\Models\User;

it('is possible to fetch a single task status from database', function () {
    $this->assertDatabaseCount('tasks', 0);
    $this->assertDatabaseCount('users', 0);
    $this->assertDatabaseCount('user_tasks', 0);
    $this->assertDatabaseCount('statuses', 0);
    $this->assertDatabaseCount('task_statuses', 0);

    User::factory()->create();
    Task::factory()->count(2)->create();
    UserTask::factory()->count(2)->create();
    Status::factory()->completed()->create();
    Status::factory()->todo()->create();
    Status::factory()->onHold()->create();

    $this->assertDatabaseCount('tasks', 2);
    $this->assertDatabaseCount('users', 1);
    $this->assertDatabaseCount('user_tasks', 2);
    $this->assertDatabaseCount('statuses', 3);

    TaskStatus::create([
        'user_task_id' => 1,
        'status_id'    => 3,   // On Hold
        'created_at'   => now()->subDays(3),
    ]);

    TaskStatus::create([
        'user_task_id' => 1,
        'status_id'    => 2,  // To Do
        'created_at'   => now()->subDays(2),
    ]);

    TaskStatus::create([
        'user_task_id' => 1,
        'status_id'    => 3,    // On Hold
        'created_at'   => now()->subDays(1),
    ]);

    TaskStatus::create([
        'user_task_id' => 1,
        'status_id'    => 1,   // Completed
        'created_at'   => now(),
    ]);

    TaskStatus::create([
        'user_task_id' => 2,
        'status_id'    => 1,  // Completed
        'created_at'   => now(),
    ]);

    $this->assertDatabaseCount('task_statuses', 5);

    $task = UserTask::with('currentStatus')->find(1);

    expect($task)->not()->toBeNull()
        ->and($task->currentStatus)->not()->toBeEmpty()
        ->and($task->currentStatus->first()->name)->toBe('Completed')
        ->and($task->currentStatus->first()->id)->toBe(1)
        ->and($task->currentStatus->first()->pivot->user_task_id)->toBe(1)
        ->and($task->currentStatus->first()->pivot->status_id)->toBe(1);

    $anotherTask = UserTask::with('anotherCurrentStatus')->find(1);

    expect($anotherTask)->not()->toBeNull()
        ->and($anotherTask->anotherCurrentStatus)->not()->toBeEmpty()
        ->and($anotherTask->anotherCurrentStatus->first()->name)->toBe('Completed')
        ->and($anotherTask->anotherCurrentStatus->first()->id)->toBe(1);
});
