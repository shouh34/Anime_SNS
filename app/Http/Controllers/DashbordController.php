<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // ← これが必要です！
use App\Notifications\CustomEmailNotification;
use App\Notifications\NotifyUser;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Http;


class DashbordController extends Controller
{
    
    
    
    public function index()
    {

        $id=session('user_id');
        $splitid=session('split_id');

        //このメールに対してメールを送信している
        /*
        $email = 'shouheirai@gmail.com';
        Notification::route('mail', $email)->notify(new CustomEmailNotification());
        */
    
    
        return view("Dashbord", compact('splitid'));
    }
    


}
