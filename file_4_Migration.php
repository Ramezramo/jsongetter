<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFile_4Table extends Migration
{
    public function up()
    {
        Schema::create('file_4', function (Blueprint $table) {
            $table->id();
            $table->integer('id');
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->integer('count');
            $table->boolean('is_visible');
            $table->json('_links');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_4');
    }
}
