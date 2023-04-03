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
        Schema::create('task_locations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('task_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('country_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('state_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->unique(['task_id', 'country_id', 'state_id', 'city_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_locations');
    }
};
