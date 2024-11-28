<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFile_8Table extends Migration
{
    public function up()
    {
        Schema::create('file_8', function (Blueprint $table) {
            $table->id();
            $table->integer('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->integer('menu_order');
            $table->integer('count');
            $table->json('_links');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_8');
    }
}
