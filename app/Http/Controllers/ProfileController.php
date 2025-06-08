<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


    //プロフィール検索機能
    public function search(Request $request)
    {
        $keyword = request('t1');
        $users = User::where('name', 'like', "%{$keyword}%")->get();


        return view("Profile.list",compact('users'));

    }

    public function info()
    {
     $id=session('user_id');
        $user = User::where('id', $id)->first();



        return view("Profile.info",compact('user'));
    }




     

/*

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
*/
}
