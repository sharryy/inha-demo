<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('task_statuses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_task_id');
            $table->unsignedBigInteger('from_status_id')->nullable();
            $table->unsignedBigInteger('to_status_id');

            $table->foreign('user_task_id')
                ->references('id')
                ->on('user_tasks')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('from_status_id')
                ->references('id')
                ->on('statuses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('to_status_id')
                ->references('id')
                ->on('statuses')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_statuses');
    }
};
