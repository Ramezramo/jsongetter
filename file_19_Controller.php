<?php

    namespace App\Http\Controllers;

    use App\Models\File_19;
    use Illuminate\Http\Request;

    class file_19_Controller extends Controller
    {
        public function index()
        {
                    return response()->json(File_19::all());
        }

        public function store(Request $request)
        {
                    $validated = $request->validate([
                
            ]);
        return File_19::create($validated);
        }

        public function show($id)
        {
                    return response()->json(File_19::find($id));
        }

        public function update(Request $request, $id)
        {
                    $validated = $request->validate([
                
            ]);
        $item = File_19::find($id);
        $item->update($validated);
        return response()->json($item);
        }

        public function destroy($id)
        {
                    $item = File_19::find($id);
            $item->delete();
            return response()->json(null, 204);
        }
    }
    