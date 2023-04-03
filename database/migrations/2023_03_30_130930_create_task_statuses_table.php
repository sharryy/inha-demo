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

            $table->foreignId('user_task_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('from_status_id')->nullable()->constrained('statuses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('to_status_id')->constrained('statuses')->cascadeOnUpdate()->cascadeOnDelete();

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
