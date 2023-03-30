<?php

namespace App\Models;

use App\Concerns\UserTask\InteractsWithRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;
    use InteractsWithRelations;

    protected array $dates = [
        'created_at',
        'updated_at',
    ];
}
