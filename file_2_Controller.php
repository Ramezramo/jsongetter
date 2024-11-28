<?php

    namespace App\Http\Controllers;

    use App\Models\File_2;
    use Illuminate\Http\Request;

    class file_2_Controller extends Controller
    {
        public function index()
        {
                    return response()->json(File_2::all());
        }

        public function store(Request $request)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'parent'=>'required',
            'description'=>'required',
            'display'=>'required',
            'image'=>'required',
            'menu_order'=>'required',
            'count'=>'required',
            'has_children'=>'required',
            '_links'=>'required'
            ]);
        return File_2::create($validated);
        }

        public function show($id)
        {
                    return response()->json(File_2::find($id));
        }

        public function update(Request $request, $id)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'parent'=>'required',
            'description'=>'required',
            'display'=>'required',
            'image'=>'required',
            'menu_order'=>'required',
            'count'=>'required',
            'has_children'=>'required',
            '_links'=>'required'
            ]);
        $item = File_2::find($id);
        $item->update($validated);
        return response()->json($item);
        }

        public function destroy($id)
        {
                    $item = File_2::find($id);
            $item->delete();
            return response()->json(null, 204);
        }
    }
    