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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->text('description')->nullable();
            $table->string('thumbnail', 255)->nullable();
            $table->string('palette', 100)->nullable();
            $table->string('typography', 100)->nullable();
            $table->string('period', 100)->nullable();
            $table->enum('status', ['draft', 'published', 'archived'])->default('published');
            $table->foreignId('community_id')->nullable()->constrained('communities')->onDelete('set null'); // Foreign key ke tabel communities
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null'); // Foreign key ke tabel categories (asumsi ada tabel categories)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
