<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    //


        public function upload(Request $request)
        {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = $file->store('public/images'); // storage/app/public/uploads に保存
            $url = asset(str_replace('public/', 'images/', $path));

            return response()->json([
                'url' => $url,
            ]);
        }
        return response()->json(['error' => 'アップロード失敗'], 400);
    }

}
