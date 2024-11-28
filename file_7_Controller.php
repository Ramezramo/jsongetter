<?php

    namespace App\Http\Controllers;

    use App\Models\File_7;
    use Illuminate\Http\Request;

    class file_7_Controller extends Controller
    {
        public function index()
        {
                    return response()->json(File_7::all());
        }

        public function store(Request $request)
        {
                    $validated = $request->validate([
                'code'=>'required',
            'name'=>'required'
            ]);
        return File_7::create($validated);
        }

        public function show($id)
        {
                    return response()->json(File_7::find($id));
        }

        public function update(Request $request, $id)
        {
                    $validated = $request->validate([
                'code'=>'required',
            'name'=>'required'
            ]);
        $item = File_7::find($id);
        $item->update($validated);
        return response()->json($item);
        }

        public function destroy($id)
        {
                    $item = File_7::find($id);
            $item->delete();
            return response()->json(null, 204);
        }
    }
    