<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFile_2Table extends Migration
{
    public function up()
    {
        Schema::create('file_2', function (Blueprint $table) {
            $table->id();
            $table->integer('id');
            $table->string('name');
            $table->string('slug');
            $table->integer('parent');
            $table->string('description');
            $table->string('display');
            $table->json('image');
            $table->integer('menu_order');
            $table->integer('count');
            $table->boolean('has_children');
            $table->json('_links');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_2');
    }
}
