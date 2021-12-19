<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageUpload;

class DropzoneController extends Controller
{
    public function dropzone()
    {
        return view('upload-view');
    }


    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();

        $image->move(storage_path('images'), $imageName);
        $unique_secret=$request->unique_secret;
        dd($request->all());
        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json([
            
            'status' => 1,
            'filename' => $imageName,
            'unique_secret'=>$unique_secret,
        ]);
    }
    
}
