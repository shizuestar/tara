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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('community_id')->constrained('communities')->onDelete('cascade');
            $table->string('project_name');
            $table->text('description')->nullable();
            $table->string('cover_images')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('progress', 5, 2)->default(0); // Contoh default
            $table->enum('status', ['ongoing', 'completed', 'pending'])->default('pending'); // Contoh default
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
