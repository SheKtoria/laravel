<?php


namespace App\Http\Controllers;
use App\Http\Requests\ObjectRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\PublicChat;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }
    public function messageSend(Request $request){
        PublicChat::dispatch($request->input('body'));
    }
}
