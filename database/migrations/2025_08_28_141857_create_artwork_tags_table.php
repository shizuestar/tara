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
        Schema::create('artwork_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artwork_id')->constrained('artworks')->onDelete('cascade'); // Foreign key ke tabel artwork
            $table->string('tag', 50);
            $table->unique(['artwork_id', 'tag']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artwork_tags');
    }
};
