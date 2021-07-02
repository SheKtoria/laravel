<?php


namespace App\Http\Controllers;

use App\Events\PrivateChat;
use App\Models\Room;
use App\Models\RoomUser;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Room $room)
    {
        return view('chat', ['room' => $room]);
    }

    public function messageSend(Request $request)
    {
        PrivateChat::dispatch($request->all());
    }

    public function chatList()
    {
        $user = auth()->user();
        $id = $user->id;
        $roomList[] = $user->rooms()->pluck('id');
        for ($i = 0; $i < count($roomList[0]); $i++) {
            $allRooms[] = RoomUser::where('room_id', $roomList[0][$i])->get();
        }
        for ($i = 0; $i < count($allRooms[0]); $i++) {
            if ($allRooms[$i][0]['user_id'] === $id) {
                $secondUsers[] = User::where('id', $allRooms[$i][1]['user_id'])->get();
            } elseif ($allRooms[$i][1]['user_id'] === $id) {
                $secondUsers[] = User::where('id', $allRooms[$i][0]['user_id'])->get();
            }
        }

        return view('chat', ['room' => $roomList[0], 'roomList' => $secondUsers]);
    }

    public function showRoom(Room $room)
    {
        return view('room', ['room' => $room]);
    }

    public function startChat(Request $request)
    {

        $userFirst = User::find($request->input('currentUserId'));
        $userSecond = User::find($request->input('userId'));
        $first = $userFirst->rooms()->pluck('id');
        $second = $userSecond->rooms()->pluck('id');
        $count = false;
        if($userFirst != $userSecond) {
            for ($i = 0; $i < count($second); $i++) {
                if ($first->contains($second[$i])) {
                    $count = true;
                    break;
                }
            }
            if (!$count) {
                $newRoom = Room::create(['name' => 'room']);
                $newRoom->save();
                $userFirst->rooms()->attach([$newRoom['id']]);
                $userSecond->rooms()->attach([$newRoom['id']]);
            }
        }
        return json_encode(['user1' => $first, 'user2' => $second]);
    }
}
