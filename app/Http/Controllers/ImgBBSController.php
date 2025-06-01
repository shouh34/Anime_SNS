<?php

namespace App\Http\Controllers;

use App\Models\imgbbs;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ImgBBSController extends Controller
{
    //


    public function index()
    {



    return view("ImgBBS");

    }


    public function post(Request $request)
    {
        // バリデーション


        // 新規スレッドのデータを保存
        imgbbs::create([
            'Thread' => $request->input('Thredname'),  // スレッド名
            'Creater' => $request->input('Creater'),  // 作成者名
            'text' => $request->input('comment'),  // コメント
            'created_at'=>'2025/0403',
            'updated_at'=>'2025/04/12'
            
        ]);

        // 成功した場合はリダイレクト（例えばスレッド一覧ページなど）
        return redirect()->route('ImgBBS')->with('success', '新しいスレッドが作成されました！');

    }



    public function Create($Title)
    {
        imgbbs::create([
            'Thread' => $Title,
            'Creater' =>"test",  // 作成者名
            'text' =>"aaaaaa",  // コメント
            'created_at'=>'2025/0403',
            'updated_at'=>'2025/04/12'
            
        ]);

        // 成功した場合はリダイレクト（例えばスレッド一覧ページなど）
//        return redirect()->route('ImgBBS')->with('success', '新しいスレッドが作成されました！');


return response("<script>alert('スレッドを作成しました'); window.history.back();</script>");



    }


    public function toukou()
    {
        
    }
}
