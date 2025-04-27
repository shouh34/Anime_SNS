<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSearcherController extends Controller
{
    //




    //ユーザー検索画面表示
    public function index()
    {

        $users = User::all();



        return view("Users.Search", compact('users'));

    }




    //検索処理
    public function Search(Request $request)
    {





    }
}
