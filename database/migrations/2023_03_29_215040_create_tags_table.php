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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('name', 255);
            $table->boolean('is_approved');
            $table->boolean('is_active');
            $table->integer('usage_points')->default(0);
            $table->integer('manual_points')->default(0);
            $table->integer('total_points')->virtualAs('usage_points + manual_points');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
