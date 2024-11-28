<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFile_6Table extends Migration
{
    public function up()
    {
        Schema::create('file_6', function (Blueprint $table) {
            $table->id();
            $table->integer('id');
            $table->string('date');
            $table->string('date_gmt');
            $table->json('guid');
            $table->string('modified');
            $table->string('modified_gmt');
            $table->string('slug');
            $table->string('status');
            $table->string('type');
            $table->string('link');
            $table->json('title');
            $table->json('content');
            $table->json('excerpt');
            $table->integer('author');
            $table->integer('featured_media');
            $table->string('comment_status');
            $table->string('ping_status');
            $table->boolean('sticky');
            $table->string('template');
            $table->string('format');
            $table->json('meta');
            $table->json('categories');
            $table->json('tags');
            $table->json('class_list');
            $table->json('better_featured_image');
            $table->string('image_feature');
            $table->string('author_name');
            $table->json('_links');
            $table->json('_embedded');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_6');
    }
}
