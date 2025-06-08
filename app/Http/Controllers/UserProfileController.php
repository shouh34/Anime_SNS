<?php

namespace App\Http\Controllers;

use App\Models\imgbbs_coment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class UserProfileController extends Controller
{
    //

    public function index()
    {    

        $id=session('user_id');
        $post = User::findOrFail($id); // IDからブログを取得
        
        return view("Profile.Edit",compact('post'));
    }


    
    public function info()
    {    

        $id=session('user_id');
        $post = User::findOrFail($id); // IDからブログを取得
        
        return view("Profile.info",compact('post'));
    }
    
    
    public function update(Request $request,$id)
    {
        
        
        $post = User::findOrFail($id);
        $post->email = $request->input('email'); 
        $post->name = $request->input('name');
        $post->comment = $request->input('comment');
        $post->updated_at = Carbon::now()->format('Y/m/d'); // 手動で更新したい場合のみ
        
        $post->save();
        return redirect()->back()->with('success', 'プロフィール画像を更新しました');
    }
    
}
