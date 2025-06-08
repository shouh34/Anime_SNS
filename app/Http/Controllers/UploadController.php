<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $path = $request->file('upload')->store('public/uploads');
            $url = Storage::url($path);

            return response()->json(['url' => $url]); // CKEditor expects this
        }

        return response()->json(['error' => 'ファイルが見つかりません'], 400);
    }

}
