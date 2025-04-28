<?php

namespace App\Http\Controllers;

use App\Models\imgbbs_coment;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class UserProfileController extends Controller
{
    //

    public function index()
    {    
        $id=session('user_id');



        $user = User::where('id', $id) // ハッシュ化されていない場合
        ->first();


        $id=$user->id;
        $name=$user->name;
        $email=$user->Email;
        $createdate=$user->created_at;
        $updatedate=$user->updated_at;
        $image=$user->Thmnail;
        $comment=$user->comment;


        //コメント投稿数取得
        $count = imgbbs_coment::where('flg', $id)->count();



        return view("profile",compact("email","name","id","createdate","updatedate","image","comment","count"));
    }



    //プロフィール編集画面遷移
    public function Store()
    {   
        
        $id=session('user_id');



        $user = User::where('id', $id) 
        ->first();


        $id=$user->id;
        $name=$user->name;
        $email=$user->Email;
        $createdate=$user->created_at;
        $updatedate=$user->updated_at;
        $image=$user->Thmnail;
        $comment=$user->comment;




        $userEmail = session('user_Email');
        
        return view("pro_Edit",compact("id","name","email","createdate","updatedate","image","comment"));
    }


    //プロフィール編集画面で

    public function update(Request $request, $id)
    {
        // IDでユーザーを検索して更新
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->comment = $request->input('comment');
        
        // ファイルがアップロードされていれば処理
        if ($request->hasFile('image')) {
            $image = $request->file('profile_image');
            
            // 画像の保存処理
            $imagePath = $image->store('images', 'public/images'); // オリジナル画像を保存
            
            // サムネイルを作成
            $thumbnailPath =basename($imagePath);
            
            // サムネイルのリサイズ
          //  $thumbnail = Image::make($image)->resize(150, 150);  // サムネイルサイズは150x150
            $image->save(public_path('storage/' . $thumbnailPath));  // サムネイル画像を保存
    
            // ユーザーのプロフィール画像パスを更新
            $user->profile_image = $imagePath;  // オリジナル画像
            $user->Thbmnail = $thumbnailPath;  // サムネイル画像
            $user->save();
        }
    
        $user->save(); // ユーザー情報の更新
        return redirect()->route('profile.show', ['user' => $user])->with('success', 'プロフィールが更新されました');
    }
    
}
