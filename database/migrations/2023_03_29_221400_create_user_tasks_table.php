<?php /** @noinspection DuplicatedCode */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id');

            $table->string('name', 255);
            $table->string('snippet', 255);
            $table->text('description');
            $table->text('reason_for_happiness');
            $table->text('steps');
            $table->string('banner_url', 255);
            $table->boolean('is_recurring')->nullable();
            $table->boolean('is_active')->nullable();
            $table->boolean('is_private')->nullable();
            $table->integer('impact')->comment('How much impact does this task have on the world? 1 for very_high, 2 for high, 3 for medium, 4 for low, 5 for very_low');
            $table->timestamp('original_task_updated_at')->nullable();
            $table->timestamp('archived_at')->nullable();

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('personalised_tasks');
    }
};
