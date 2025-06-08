<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //


    //ブログの一覧画面表示
public function index()
{
    try {
        //セッション取得
        $id=session('user_id');
        $blogs = Blog::where('user_id', $id)->latest()->paginate(5);


        return view('Blog.index', compact('blogs'));

    } catch (\Exception $e) {

        // ユーザー向けのエラーメッセージを返す
        return back()->with('error', 'ブログ一覧の取得中にエラーが発生しました。');
    }
}


//投稿フォーム表示
    public function Edit()
    {

        return view("Blog.Edit");

    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $path = $request->file('upload')->store('public/uploads');
            $url = Storage::url($path);

            return response()->json(['url' => $url]); // CKEditor expects this
        }

        return response()->json(['error' => 'ファイルが見つかりません'], 400);
    }




    //該当記事削除
    public function Delete($id)
    {
        

      try {
        $post = Blog::findOrFail($id); // IDからブログ取得
        $post->delete();               // 削除

        return redirect()->route('Blog.index')->with('success', '削除しました');

    } catch (ModelNotFoundException $e) {
        // 該当IDが存在しない場合
        return redirect()->route('Blog.index')->with('error', 'ブログが見つかりませんでした');
    } catch (\Exception $e) {
        // その他の例外（データベースエラーなど）
        return redirect()->route('Blog.index')->with('error', '削除中にエラーが発生しました');
    }
        
        
    }



    //編集画面に渡す
    public function Edit_info($id)
    {
        
        $post = Blog::findOrFail($id); // IDからブログを取得
        
        return view('Blog.ReEdit', compact('post'));
    }

    //ポスト
    public function Edit_info_post(Request $request,$id)
    {
        $post = Blog::findOrFail($id); // IDからブログを取得
        
        $id=session('user_id');
        $post->Title = $request->input('title');
        $post->Content = html_entity_decode($request->input('body'));
        $post->user_id=$id;
        $post->save();
        
        return redirect()->route('Blog.index', ['id' => $id])->with('success', 'ブログを更新しました');

        
        //return view('Blog.ReEdit', compact('post'));
    }


    //本文を表示
    public function main_info($id)
    {
        
        $post = Blog::findOrFail($id); // IDからブログを取得
        
        return view('Blog.main', compact('post'));
    }
    

    

    //新規投稿処理
    public function post(Request $request)
    {
    // バリデーション（任意）
    $validated = $request->validate([
        'title' => 'required|string|max:10',
        'body' => 'required|string',
    ]);


    $post = new Blog();
    $post->Title = $request->input('title');
    $post->Content = html_entity_decode($request->input('body'));

    $id=session('user_id');
    //ユーザーIDで識別
    $post->user_id=$id;
    
    // 画像がアップロードされている場合のみ処理
    if ($request->hasFile('image')) {
    $path = $request->file('image')->store('public/uploads');
    $post->image1 = Storage::url($path); // 例: /storage/uploads/xxx.jpg
    }
    
    $post->save();
    
    return redirect()->route('Blog.index')->with('success', '書き込みしました');
    }
}
