<?php


namespace App\Http\Controllers;

use App\Events\PrivateChat;
use App\Models\Messages;
use App\Models\Room;
use App\Models\RoomUser;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Room $room)
    {
        return view('chat', ['room' => $room]);
    }

    public function messageSend(Request $request)
    {
        $room = Room::find($request->input('room_id'));
        $message = new Messages();
        $message->room_id = $room->id;
        $message->messages = $request->input('body');
        $message->save();
        PrivateChat::dispatch($request->all());
    }

    public function chatList()
    {
        $secondUsers= $this->checkRooms();
        return view('chat', ['roomList' => $secondUsers]);

    }

    public function showRoom(Room $room)
    {
        $secondUsers= $this->checkRooms();
        return view('room', ['room' => $room, 'roomList' => $secondUsers]);

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
    private function checkRooms()
    {
        $user = auth()->user();
        $id = $user->id;
        $roomList[] = $user->rooms;
        for ($i = 0; $i < count($roomList[0]); $i++) {
            $allRooms[] = RoomUser::where('room_id', $roomList[0][$i]['id'])->get();
        }
        if (count($roomList[0]) !== 0) {
            for ($i = 0; $i < count($allRooms); $i++) {
                if ($allRooms[$i][0]['user_id'] == $id) {
                    $secondUsers[] = User::where('id', $allRooms[$i][1]['user_id'])->get();
                } elseif ($allRooms[$i][1]['user_id'] == $id) {
                    $secondUsers[] = User::where('id', $allRooms[$i][0]['user_id'])->get();
                }
            }
            return  $secondUsers;
        }
    }
}
