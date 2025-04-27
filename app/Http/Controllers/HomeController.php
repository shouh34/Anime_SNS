<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //


    public function index()
    {
        return view('home'); // ログイン画面のviewパスを明示
    }

    public function store(Request $request)
    {
        $email = $request->input('Email');
        $password = $request->input('password');
    
        Log::info('ログイン試行：', ['email' => $email]);
    
        $user = User::where('Email', $email)->first();
    
        if ($user && Hash::check($password, $user->Password)) {
            Auth::login($user);
            session(['user_id' => $user->id]);
            session(['user_Email' => $user->Email]);
            session(['user_Password' => $user->Password]);
            session(['user_Registerdate' => $user->Registerdate]);
            session(['user_name' => $user->name]);
            Log::info('ログイン成功', ['user_id' => $user->id]);
    
            return redirect('/Dashbord');
        } else {
            Log::warning('ログイン失敗', ['email' => $email]);
            return redirect()->back()->withErrors([
                'login' => 'メールアドレスまたはパスワードが正しくありません'
            ]);
        }
    }
    

}
