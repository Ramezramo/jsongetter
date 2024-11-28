<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFile_5Table extends Migration
{
    public function up()
    {
        Schema::create('file_5', function (Blueprint $table) {
            $table->id();
            $table->integer('id');
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->string('order_by');
            $table->boolean('has_archives');
            $table->boolean('is_visible');
            $table->json('_links');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_5');
    }
}
