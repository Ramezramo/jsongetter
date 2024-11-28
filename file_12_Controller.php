<?php

    namespace App\Http\Controllers;

    use App\Models\File_12;
    use Illuminate\Http\Request;

    class file_12_Controller extends Controller
    {
        public function index()
        {
                    return response()->json(File_12::all());
        }

        public function store(Request $request)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'permalink'=>'required',
            'date_created'=>'required',
            'date_created_gmt'=>'required',
            'date_modified'=>'required',
            'date_modified_gmt'=>'required',
            'type'=>'required',
            'status'=>'required',
            'featured'=>'required',
            'catalog_visibility'=>'required',
            'description'=>'required',
            'short_description'=>'required',
            'sku'=>'required',
            'price'=>'required',
            'regular_price'=>'required',
            'sale_price'=>'required',
            'date_on_sale_from'=>'required',
            'date_on_sale_from_gmt'=>'required',
            'date_on_sale_to'=>'required',
            'date_on_sale_to_gmt'=>'required',
            'on_sale'=>'required',
            'purchasable'=>'required',
            'total_sales'=>'required',
            'virtual'=>'required',
            'downloadable'=>'required',
            'downloads'=>'required',
            'download_limit'=>'required',
            'download_expiry'=>'required',
            'external_url'=>'required',
            'button_text'=>'required',
            'tax_status'=>'required',
            'tax_class'=>'required',
            'manage_stock'=>'required',
            'stock_quantity'=>'required',
            'backorders'=>'required',
            'backorders_allowed'=>'required',
            'backordered'=>'required',
            'low_stock_amount'=>'required',
            'sold_individually'=>'required',
            'weight'=>'required',
            'dimensions'=>'required',
            'shipping_required'=>'required',
            'shipping_taxable'=>'required',
            'shipping_class'=>'required',
            'shipping_class_id'=>'required',
            'reviews_allowed'=>'required',
            'average_rating'=>'required',
            'rating_count'=>'required',
            'upsell_ids'=>'required',
            'cross_sell_ids'=>'required',
            'parent_id'=>'required',
            'purchase_note'=>'required',
            'categories'=>'required',
            'tags'=>'required',
            'images'=>'required',
            'attributes'=>'required',
            'default_attributes'=>'required',
            'variations'=>'required',
            'grouped_products'=>'required',
            'menu_order'=>'required',
            'price_html'=>'required',
            'related_ids'=>'required',
            'meta_data'=>'required',
            'stock_status'=>'required',
            'has_options'=>'required',
            'post_password'=>'required',
            'global_unique_id'=>'required',
            'better_featured_image'=>'required',
            'is_purchased'=>'required',
            'attributesData'=>'required',
            'is_wallet_product'=>'required',
            '_links'=>'required',
            'min_price'=>'required',
            'max_price'=>'required'
            ]);
        return File_12::create($validated);
        }

        public function show($id)
        {
                    return response()->json(File_12::find($id));
        }

        public function update(Request $request, $id)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'permalink'=>'required',
            'date_created'=>'required',
            'date_created_gmt'=>'required',
            'date_modified'=>'required',
            'date_modified_gmt'=>'required',
            'type'=>'required',
            'status'=>'required',
            'featured'=>'required',
            'catalog_visibility'=>'required',
            'description'=>'required',
            'short_description'=>'required',
            'sku'=>'required',
            'price'=>'required',
            'regular_price'=>'required',
            'sale_price'=>'required',
            'date_on_sale_from'=>'required',
            'date_on_sale_from_gmt'=>'required',
            'date_on_sale_to'=>'required',
            'date_on_sale_to_gmt'=>'required',
            'on_sale'=>'required',
            'purchasable'=>'required',
            'total_sales'=>'required',
            'virtual'=>'required',
            'downloadable'=>'required',
            'downloads'=>'required',
            'download_limit'=>'required',
            'download_expiry'=>'required',
            'external_url'=>'required',
            'button_text'=>'required',
            'tax_status'=>'required',
            'tax_class'=>'required',
            'manage_stock'=>'required',
            'stock_quantity'=>'required',
            'backorders'=>'required',
            'backorders_allowed'=>'required',
            'backordered'=>'required',
            'low_stock_amount'=>'required',
            'sold_individually'=>'required',
            'weight'=>'required',
            'dimensions'=>'required',
            'shipping_required'=>'required',
            'shipping_taxable'=>'required',
            'shipping_class'=>'required',
            'shipping_class_id'=>'required',
            'reviews_allowed'=>'required',
            'average_rating'=>'required',
            'rating_count'=>'required',
            'upsell_ids'=>'required',
            'cross_sell_ids'=>'required',
            'parent_id'=>'required',
            'purchase_note'=>'required',
            'categories'=>'required',
            'tags'=>'required',
            'images'=>'required',
            'attributes'=>'required',
            'default_attributes'=>'required',
            'variations'=>'required',
            'grouped_products'=>'required',
            'menu_order'=>'required',
            'price_html'=>'required',
            'related_ids'=>'required',
            'meta_data'=>'required',
            'stock_status'=>'required',
            'has_options'=>'required',
            'post_password'=>'required',
            'global_unique_id'=>'required',
            'better_featured_image'=>'required',
            'is_purchased'=>'required',
            'attributesData'=>'required',
            'is_wallet_product'=>'required',
            '_links'=>'required',
            'min_price'=>'required',
            'max_price'=>'required'
            ]);
        $item = File_12::find($id);
        $item->update($validated);
        return response()->json($item);
        }

        public function destroy($id)
        {
                    $item = File_12::find($id);
            $item->delete();
            return response()->json(null, 204);
        }
    }
    