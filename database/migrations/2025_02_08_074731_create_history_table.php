<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('name');
            $table->text('tasks');
            $table->integer('hours');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
