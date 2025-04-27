<?php

namespace App\Http\Controllers;

use App\Models\imgbbs_coment;
use App\Models\User;
use Illuminate\Http\Request;

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
    public function Edit(Request $request,$id)
    {



    // IDで検索して更新
    $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    $user->comment = $request->input('comment');
    /*
    // ファイルがアップロードされていれば処理
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $imageName = time() . '_' . $file->getClientOriginalName();

  
        // 画像保存
        $file->storeAs('public/images', $imageName);

        // ファイル名をDBに保存（Thumbnail カラムに）
        $user->Thmnail = $imageName;
    }


    */
    $user->save(); // UPDATE実行
  //  return redirect()->back()->with('success', 'プロフィールが更新されました');
    
    return redirect()->intended('/profile');
            
    }

    
}
