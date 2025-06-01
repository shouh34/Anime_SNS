<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //


    public function index()
    {


        //認証チェックして、認証されていたらダッシュボードに遷移
        if (Auth::check()) {
            return redirect()->route('dashboard'); // ログインしているならダッシュボードにリダイレクト
        }
    
       // return view('login'); // ログインしていなければログイン画面を表示
    
        return view('home'); // ログイン画面のviewパスを明示
    }

    public function store(Request $request)
    {
//        $email = $request->input('Email');
        $email = $request->only('Email', 'password');
        $password = $request->input('password');


        //自動ログインチェックボックス
        $remember = $request->has('remember'); 
    
        Log::info('ログイン試行：', ['email' => $email]);

        
        Cache::remember('key', now()->addMinutes(10), function () use ($email) {
            return User::where('Email', $email)->first();    
        });
        
        $user = User::where('Email', $email)->first();    
    
    
        if ($user && Hash::check($password, $user->Password)) {
            Auth::login($user,true);
            session(['user_id' => $user->id]);
            session(['split_id' => '1']);
            session(['user_Email' => $user->Email]);
            session(['user_Password' => $user->Password]);
            session(['user_Registerdate' => $user->Registerdate]);
            session(['user_name' => $user->name]);
            Log::info('ログイン成功', ['user_id' => $user->id]);
            return redirect()->route('Dashbord', ['user' =>'1']);

            //return redirect('/Dashbord');
        } else {
            Log::warning('ログイン失敗', ['email' => $email]);
            return redirect()->back()->withErrors([
                'login' => 'メールアドレスまたはパスワードが正しくありません'
            ]);
        }
    }
    

}
