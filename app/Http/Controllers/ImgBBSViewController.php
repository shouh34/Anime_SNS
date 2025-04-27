<?php

namespace App\Http\Controllers;

use App\Models\imgbbs;
use App\Models\imgbbs_come;
use App\Models\imgbbs_coment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImgBBSViewController extends Controller
{
    //


    public function index()
    {
        $users = imgbbs::paginate(6); // 1ページに10件ずつ表示


        return view("ImgBBSview",compact('users'));

    }



    //ここで引数を受けて、スレッドのコメントをすべて取得して画面に渡している
    //判定はIDでテーブル内の該当すflgをwhereで絞りだしている
    public function Store($id)
    {

        //$imgbbs = imgbbs_coment::all();
        $imgbbs = imgbbs_coment::where('flg', $id)->paginate(5);

        $user_id=session('user_id');    

        $imgbbs = imgbbs_coment::where('bbs_flg', $id)->paginate(5);



        //該当件数取得
        $count = imgbbs_coment::where('flg', $user_id)
        ->where('bbs_flg', $id)
        ->count();



        $imgbbsfind = imgbbs::find($id);


        //$id=session('user_id');
        $user = User::where('id', $id)->first();




        return view("imgBBSpostview",compact('imgbbs','imgbbsfind','id','count'));
    }



    //リプライ件数を追加
    public function Reply_add($id)
    {



    }


    //いいね件数追加
    public function Good_add($id)
    {
        $userid=session('user_id');

        $comment = imgbbs_coment::where('flg', $userid)
        ->where('bbs_flg', $id)
        ->first();
if ($comment) {
            $comment->Good_no = ($comment->Good_no ?? 0) + 1;
            $comment->save();
        }
        return back();

        
    }



    //バッド件数追加
    public function Bad_add($id)
    {

    }




    public function post(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);
    
        $now = Carbon::now();
        $dateTimeString = $now->format('Y-m-d H:i:s');
    
        $username = session('user_name');
        $user_id = session('user_id');
    
        try {
            // ログで投稿前の情報確認
            Log::debug('コメント投稿開始', [
                'user_name' => $username,
                'user_id' => $user_id,
                'comment' => $request->input('comment'),
                'bbs_flg' => $id,
            ]);
    
            // コメント作成
            imgbbs_coment::create([
                'name' => $username,
                'Comment' => $request->input('comment'),
                'Comment_data' => $dateTimeString,
                'flg' => $user_id,
                'bbs_flg' => $id,
            ]);
    
            // 成功時ログ
            Log::info('コメント投稿成功', ['user_id' => $user_id, 'bbs_flg' => $id]);
    
            return redirect()->back()->with('success', 'コメントを投稿しました');
    
        } catch (\Exception $e) {
            // エラーログ出力
            Log::error('コメント投稿エラー', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => $user_id,
            ]);
    
            return redirect()->back()->withErrors(['error' => 'コメント投稿中にエラーが発生しました']);
        }
    }
}
