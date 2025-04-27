<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //




    //ログアウトの処理
    public function index()
    {
        Auth::logout();
        session()->flush();              // セッションデータを全て破棄
        request()->session()->invalidate(); // セッションIDを無効化
        request()->session()->regenerateToken(); // CSRFトークン再生成
    
        return redirect('/');
    }

}
