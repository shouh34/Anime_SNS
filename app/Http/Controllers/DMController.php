<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class DMController extends Controller
{
    //



    public function index()
    {



        $id=session('user_id');

        // そのユーザーが送信したメッセージ一覧を取得
        $messages = Message::where('sender_id', $id)->get();
    
        // DM.blade.php に messages 変数として渡す
        return view("DM", ['messages' => $messages]);
    }




    public function Mesget()
    {



        
    }
    
    
    public function store(Request $request)
    {
    $request->validate([
        'recipient_id' => 'required|exists:users,id',
        'message' => 'required|string|max:1000',
    ]);

    Message::create([
        'sender_id' => auth()->id(),
        'recipient_id' => $request->recipient_id,
        'body' => $request->message,
    ]);

    return redirect()->back()->with('success', 'メッセージを送信しました。');
}
}
