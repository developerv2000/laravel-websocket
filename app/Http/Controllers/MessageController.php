<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $message = Message::create($request->all());
        MessageCreated::dispatch($message);

        return;
    }
}
