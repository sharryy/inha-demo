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

            $table->foreignId('task_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('name', 255);
            $table->string('snippet', 255);
            $table->text('description');
            $table->text('reason_for_happiness');
            $table->text('steps');
            $table->string('banner_url', 255)->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_private')->default(false);
            $table->integer('impact')->comment('How much impact does this task have on the world? 1 for very_high, 2 for high, 3 for medium, 4 for low, 5 for very_low');
            $table->timestamp('original_task_updated_at')->nullable();
            $table->timestamp('archived_at')->nullable();

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
