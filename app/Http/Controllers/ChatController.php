<?php


namespace App\Http\Controllers;

use App\Events\PrivateChat;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function messageSend(Request $request)
    {
        PrivateChat::dispatch($request->all());
    }

    public function showRoom(Room $room)
    {
        return view('room', ['room' => $room]);
    }

    public function startChat(Request $request)
    {

        $userFirst = User::find($request->input('currentUserId'));
        $firstUserId = $request->input('currentUserId');
        $userSecond = User::find($request->input('userId'));
        $secondUserId = $request->input('userId');
        $first = $userFirst->rooms()->where('user_id', $firstUserId)->get();
        $second = $userSecond->rooms()->where('user_id', $secondUserId)->get();
        $k = 0;
        for ($i = 0; $i < count($first); $i++) {
            for ($j = 0; $j < count($second); $j++) {
                if ($first[$i]['id'] === $second[$j]['id']) {
                    $k++;
                }
            }
        }
        if ($k === 0) {
            $newRoom = Room::create(['name' => 'room']);
            $newRoom->save();
            $userFirst->rooms()->attach([$newRoom['id']]);
            $userSecond->rooms()->attach([$newRoom['id']]);
        }
        return json_encode(['user1' => $userFirst, 'user2' => $userSecond]);
    }
}
