<?php


namespace App\Http\Controllers;
use App\Http\Requests\ObjectRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }
    public function messageSend(Request $request){
        App\Events\PublicChat::dispatch($request->input('body'));
    }
}
