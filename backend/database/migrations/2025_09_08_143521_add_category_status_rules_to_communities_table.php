<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->string('category')->after('name');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('type');
            $table->text('rules')->nullable()->after('cover_image'); 
        });
    }

    public function down(): void
    {
        Schema::table('communities', function (Blueprint $table) {
            $table->dropColumn(['category', 'status', 'rules']);
        });
    }
};