<?php

    namespace App\Http\Controllers;

    use App\Models\File_9;
    use Illuminate\Http\Request;

    class file_9_Controller extends Controller
    {
        public function index()
        {
                    return response()->json(File_9::all());
        }

        public function store(Request $request)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'code'=>'required',
            'amount'=>'required',
            'status'=>'required',
            'date_created'=>'required',
            'date_created_gmt'=>'required',
            'date_modified'=>'required',
            'date_modified_gmt'=>'required',
            'discount_type'=>'required',
            'description'=>'required',
            'date_expires'=>'required',
            'date_expires_gmt'=>'required',
            'usage_count'=>'required',
            'individual_use'=>'required',
            'product_ids'=>'required',
            'excluded_product_ids'=>'required',
            'usage_limit'=>'required',
            'usage_limit_per_user'=>'required',
            'limit_usage_to_x_items'=>'required',
            'free_shipping'=>'required',
            'product_categories'=>'required',
            'excluded_product_categories'=>'required',
            'exclude_sale_items'=>'required',
            'minimum_amount'=>'required',
            'maximum_amount'=>'required',
            'email_restrictions'=>'required',
            'used_by'=>'required',
            'meta_data'=>'required',
            '_links'=>'required'
            ]);
        return File_9::create($validated);
        }

        public function show($id)
        {
                    return response()->json(File_9::find($id));
        }

        public function update(Request $request, $id)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'code'=>'required',
            'amount'=>'required',
            'status'=>'required',
            'date_created'=>'required',
            'date_created_gmt'=>'required',
            'date_modified'=>'required',
            'date_modified_gmt'=>'required',
            'discount_type'=>'required',
            'description'=>'required',
            'date_expires'=>'required',
            'date_expires_gmt'=>'required',
            'usage_count'=>'required',
            'individual_use'=>'required',
            'product_ids'=>'required',
            'excluded_product_ids'=>'required',
            'usage_limit'=>'required',
            'usage_limit_per_user'=>'required',
            'limit_usage_to_x_items'=>'required',
            'free_shipping'=>'required',
            'product_categories'=>'required',
            'excluded_product_categories'=>'required',
            'exclude_sale_items'=>'required',
            'minimum_amount'=>'required',
            'maximum_amount'=>'required',
            'email_restrictions'=>'required',
            'used_by'=>'required',
            'meta_data'=>'required',
            '_links'=>'required'
            ]);
        $item = File_9::find($id);
        $item->update($validated);
        return response()->json($item);
        }

        public function destroy($id)
        {
                    $item = File_9::find($id);
            $item->delete();
            return response()->json(null, 204);
        }
    }
    