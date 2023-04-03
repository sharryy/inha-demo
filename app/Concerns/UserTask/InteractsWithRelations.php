<?php

namespace App\Concerns\UserTask;

use App\Models\Status;
use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

trait InteractsWithRelations
{
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function currentStatus(): belongsToMany
    {
        return $this->belongsToMany(Status::class, TaskStatus::class, 'user_task_id', 'to_status_id')
            ->withPivot('from_status_id', 'created_at')
            ->latest('task_statuses.created_at')
            ->take(1);
    }

    public function anotherCurrentStatus(): HasManyThrough
    {
        return $this->hasManyThrough(Status::class, TaskStatus::class, 'user_task_id', 'id', 'id', 'status_id')
            ->latest('task_statuses.created_at')
            ->take(1);
    }

    public function statusTrail(): HasManyThrough
    {
        return $this->hasManyThrough(Status::class, TaskStatus::class, 'user_task_id', 'id', 'id', 'status_id');
    }
}
