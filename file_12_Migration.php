<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFile_12Table extends Migration
{
    public function up()
    {
        Schema::create('file_12', function (Blueprint $table) {
            $table->id();
            $table->integer('id');
            $table->string('name');
            $table->string('slug');
            $table->string('permalink');
            $table->string('date_created');
            $table->string('date_created_gmt');
            $table->string('date_modified');
            $table->string('date_modified_gmt');
            $table->string('type');
            $table->string('status');
            $table->boolean('featured');
            $table->string('catalog_visibility');
            $table->string('description');
            $table->string('short_description');
            $table->string('sku');
            $table->integer('price');
            $table->integer('regular_price');
            $table->nullable('sale_price');
            $table->nullable('date_on_sale_from');
            $table->nullable('date_on_sale_from_gmt');
            $table->nullable('date_on_sale_to');
            $table->nullable('date_on_sale_to_gmt');
            $table->boolean('on_sale');
            $table->boolean('purchasable');
            $table->integer('total_sales');
            $table->boolean('virtual');
            $table->boolean('downloadable');
            $table->json('downloads');
            $table->integer('download_limit');
            $table->integer('download_expiry');
            $table->string('external_url');
            $table->string('button_text');
            $table->string('tax_status');
            $table->string('tax_class');
            $table->boolean('manage_stock');
            $table->integer('stock_quantity');
            $table->string('backorders');
            $table->boolean('backorders_allowed');
            $table->boolean('backordered');
            $table->nullable('low_stock_amount');
            $table->boolean('sold_individually');
            $table->string('weight');
            $table->json('dimensions');
            $table->boolean('shipping_required');
            $table->boolean('shipping_taxable');
            $table->string('shipping_class');
            $table->integer('shipping_class_id');
            $table->boolean('reviews_allowed');
            $table->string('average_rating');
            $table->integer('rating_count');
            $table->json('upsell_ids');
            $table->json('cross_sell_ids');
            $table->integer('parent_id');
            $table->string('purchase_note');
            $table->json('categories');
            $table->json('tags');
            $table->json('images');
            $table->json('attributes');
            $table->json('default_attributes');
            $table->json('variations');
            $table->json('grouped_products');
            $table->integer('menu_order');
            $table->string('price_html');
            $table->json('related_ids');
            $table->json('meta_data');
            $table->string('stock_status');
            $table->boolean('has_options');
            $table->string('post_password');
            $table->string('global_unique_id');
            $table->nullable('better_featured_image');
            $table->boolean('is_purchased');
            $table->json('attributesData');
            $table->boolean('is_wallet_product');
            $table->json('_links');
            $table->string('min_price');
            $table->string('max_price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('file_12');
    }
}
