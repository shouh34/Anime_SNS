<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SampleNotification;


class RedisterController extends Controller
{
    //


    public function index()
    {


        return view("register");

    }
    
    public function store(Request $request)
    {


        User::create([
            'Email' =>  $request->input(['email']),
            'Password' => Hash::make($request->input('password')),
            'name'=>$request->input('name'),
            'comment'=>'test',
            'created_at'=>'2025/12/11',
            'updated_at'=>'2025/01/11'
            
        ]);

        /*
        $email = 'AniConnect@gmail.com';
        Notification::route('mail', $email) // メール送信先
        ->notify(new SampleNotification()); // 通知を送信
*/
        return redirect('/');
    }

}
