<?php

namespace App\Concerns\Task;

use App\Models\UserTask;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait InteractsWithRelation
{
    public function userTask(): HasMany
    {
        return $this->hasMany(UserTask::class);
    }
}
