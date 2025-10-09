<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorLogsTable extends Migration
{
    public function up()
    {
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('visit_date');
            $table->unsignedInteger('visit_count')->default(1);
            $table->timestamps();
            $table->unique(['user_id', 'visit_date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitor_logs');
    }
}