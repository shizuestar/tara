<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackupsTable extends Migration
{
    public function up()
    {
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('backups');
    }
}