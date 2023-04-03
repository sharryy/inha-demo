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
            $table->string('banner_url', 255)->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_private')->default(false);
            $table->boolean('is_draft')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->json('seo')->nullable();
            $table->integer('points')->default(0);
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
