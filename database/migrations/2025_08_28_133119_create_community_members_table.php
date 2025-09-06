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
        Schema::create('community_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_id')->constrained('communities')->onDelete('cascade'); // Foreign key ke tabel communities
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key ke tabel users
            $table->enum('role', ['member', 'moderator', 'admin'])->default('member');
            $table->timestamp('joined_at')->useCurrent(); // Default current timestamp
            $table->unique(['community_id', 'user_id']); // Memastikan satu user hanya bisa jadi member sekali di satu komunitas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_members');
    }
};
