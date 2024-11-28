<?php

    namespace App\Http\Controllers;

    use App\Models\File_6;
    use Illuminate\Http\Request;

    class file_6_Controller extends Controller
    {
        public function index()
        {
                    return response()->json(File_6::all());
        }

        public function store(Request $request)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'date'=>'required',
            'date_gmt'=>'required',
            'guid'=>'required',
            'modified'=>'required',
            'modified_gmt'=>'required',
            'slug'=>'required',
            'status'=>'required',
            'type'=>'required',
            'link'=>'required',
            'title'=>'required',
            'content'=>'required',
            'excerpt'=>'required',
            'author'=>'required',
            'featured_media'=>'required',
            'comment_status'=>'required',
            'ping_status'=>'required',
            'sticky'=>'required',
            'template'=>'required',
            'format'=>'required',
            'meta'=>'required',
            'categories'=>'required',
            'tags'=>'required',
            'class_list'=>'required',
            'better_featured_image'=>'required',
            'image_feature'=>'required',
            'author_name'=>'required',
            '_links'=>'required',
            '_embedded'=>'required'
            ]);
        return File_6::create($validated);
        }

        public function show($id)
        {
                    return response()->json(File_6::find($id));
        }

        public function update(Request $request, $id)
        {
                    $validated = $request->validate([
                'id'=>'required',
            'date'=>'required',
            'date_gmt'=>'required',
            'guid'=>'required',
            'modified'=>'required',
            'modified_gmt'=>'required',
            'slug'=>'required',
            'status'=>'required',
            'type'=>'required',
            'link'=>'required',
            'title'=>'required',
            'content'=>'required',
            'excerpt'=>'required',
            'author'=>'required',
            'featured_media'=>'required',
            'comment_status'=>'required',
            'ping_status'=>'required',
            'sticky'=>'required',
            'template'=>'required',
            'format'=>'required',
            'meta'=>'required',
            'categories'=>'required',
            'tags'=>'required',
            'class_list'=>'required',
            'better_featured_image'=>'required',
            'image_feature'=>'required',
            'author_name'=>'required',
            '_links'=>'required',
            '_embedded'=>'required'
            ]);
        $item = File_6::find($id);
        $item->update($validated);
        return response()->json($item);
        }

        public function destroy($id)
        {
                    $item = File_6::find($id);
            $item->delete();
            return response()->json(null, 204);
        }
    }
    