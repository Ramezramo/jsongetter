<?php

    namespace App\Http\Controllers;

    use App\Models\File_5;
    use Illuminate\Http\Request;

    class file_5_Controller extends Controller
    {
        public function index()
        {
                    return response()->json(File_5::all());
        }

        public function store(Request $request)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'type'=>'required',
            'order_by'=>'required',
            'has_archives'=>'required',
            'is_visible'=>'required',
            '_links'=>'required'
            ]);
        return File_5::create($validated);
        }

        public function show($id)
        {
                    return response()->json(File_5::find($id));
        }

        public function update(Request $request, $id)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'type'=>'required',
            'order_by'=>'required',
            'has_archives'=>'required',
            'is_visible'=>'required',
            '_links'=>'required'
            ]);
        $item = File_5::find($id);
        $item->update($validated);
        return response()->json($item);
        }

        public function destroy($id)
        {
                    $item = File_5::find($id);
            $item->delete();
            return response()->json(null, 204);
        }
    }
    