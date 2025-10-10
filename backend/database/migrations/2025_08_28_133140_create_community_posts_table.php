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
        Schema::create('community_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('community_id')->constrained('communities')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title', 200);
            $table->string('slug')->unique()->nullable();
            $table->text('content')->nullable();
            $table->enum('type', ['text', 'images', 'video', 'link', 'discussion', 'announcement', 'poll', 'media'])->nullable()->default('discussion');
            $table->string('file_path', 255)->nullable();
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedInteger('views')->default(0); 
            $table->unsignedInteger('comments_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('community_posts');
    }
};
