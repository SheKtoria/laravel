<?php


namespace App\Http\Controllers;
use App\Http\Requests\ObjectRequest;
use App\Http\Requests\UserRequest;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\PublicChat;
use App\Events\PrivateChat;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }
    public function messageSend(Request $request){
        PrivateChat::dispatch($request->all());
    }
    public function showRoom(Room $room){
        return view('room', ['room' => $room]);
    }
}
