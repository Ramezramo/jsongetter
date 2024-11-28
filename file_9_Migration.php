<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFile_9Table extends Migration
{
    public function up()
    {
        Schema::create('file_9', function (Blueprint $table) {
            $table->id();
            $table->integer('id');
            $table->string('code');
            $table->string('amount');
            $table->string('status');
            $table->string('date_created');
            $table->string('date_created_gmt');
            $table->string('date_modified');
            $table->string('date_modified_gmt');
            $table->string('discount_type');
            $table->string('description');
            $table->string('date_expires');
            $table->string('date_expires_gmt');
            $table->integer('usage_count');
            $table->boolean('individual_use');
            $table->json('product_ids');
            $table->json('excluded_product_ids');
            $table->nullable('usage_limit');
            $table->nullable('usage_limit_per_user');
            $table->nullable('limit_usage_to_x_items');
            $table->boolean('free_shipping');
            $table->json('product_categories');
            $table->json('excluded_product_categories');
            $table->boolean('exclude_sale_items');
            $table->string('minimum_amount');
            $table->string('maximum_amount');
            $table->json('email_restrictions');
            $table->json('used_by');
            $table->json('meta_data');
            $table->json('_links');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_9');
    }
}
