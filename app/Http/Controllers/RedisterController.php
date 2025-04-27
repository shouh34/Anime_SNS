<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'Thmnail' => "",
            'name'=>$request->input('name'),
            'comment'=>'test',
            'created_at'=>'2025/12/11',
            'updated_at'=>'2025/01/11'
            
        ]);

        return redirect('/');
    }

}
