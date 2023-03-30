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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('name', 255);
            $table->string('snippet', 255);
            $table->text('description');
            $table->text('reason_for_happiness');
            $table->text('steps');
            $table->string('image_url', 255);
            $table->boolean('is_recurring');
            $table->boolean('is_active');
            $table->boolean('is_private');
            $table->boolean('is_draft');
            $table->boolean('is_approved');
            $table->json('seo');
            $table->integer('points');
            $table->integer('impact')->comment('How much impact does this task have on the world? 1 for very_high, 2 for high, 3 for medium, 4 for low, 5 for very_low');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
