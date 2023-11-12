<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function home()
    {
        $messages = Message::latest()->take(10)->get();

        return view('home', compact('messages'));
    }
}
