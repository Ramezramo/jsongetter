<?php

    namespace App\Http\Controllers;

    use App\Models\File_3;
    use Illuminate\Http\Request;

    class file_3_Controller extends Controller
    {
        public function index()
        {
                    return response()->json(File_3::all());
        }

        public function store(Request $request)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'count'=>'required',
            'is_visible'=>'required',
            '_links'=>'required'
            ]);
        return File_3::create($validated);
        }

        public function show($id)
        {
                    return response()->json(File_3::find($id));
        }

        public function update(Request $request, $id)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'count'=>'required',
            'is_visible'=>'required',
            '_links'=>'required'
            ]);
        $item = File_3::find($id);
        $item->update($validated);
        return response()->json($item);
        }

        public function destroy($id)
        {
                    $item = File_3::find($id);
            $item->delete();
            return response()->json(null, 204);
        }
    }
    