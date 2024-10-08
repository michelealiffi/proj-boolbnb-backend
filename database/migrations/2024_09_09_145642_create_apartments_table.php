<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title', 230);
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('price');
            $table->unsignedTinyInteger('rooms');
            $table->unsignedTinyInteger('bathrooms');
            $table->smallInteger('square_meters');
            $table->string('address', 500);
            $table->float('latitude', 12, 10);
            $table->float('longitude', 13, 10);
            $table->string('image', 2048);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
