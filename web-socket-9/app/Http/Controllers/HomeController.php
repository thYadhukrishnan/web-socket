<?php

namespace App\Http\Controllers;

use App\Events\SendNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeView(){
        return view('home');
    }

    public function second(){
        return view('second');
    }

    public function sendMessage(Request $request){
        $message = $request->input('message');
        SendNotification::dispatch($message);
        return redirect()->route('homeView');
    }
}
