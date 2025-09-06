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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('location', 100);
            $table->text('description');
            $table->enum('status', ['upcoming', 'ongoing', 'past'])->default('upcoming');
            $table->string('image_path', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
