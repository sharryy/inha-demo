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
        Schema::create('task_images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id');
            $table->string('image_url', 255);
            $table->string('image_alt', 255);
            $table->integer('width');
            $table->integer('height');
            $table->integer('order')->nullable();

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
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
        Schema::dropIfExists('task_images');
    }
};
