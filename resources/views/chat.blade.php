@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card chatWindow">
                <div class="card-header">{{ __('Chats') }}
                </div>
                <div class="row chat-card-inner">
                    <div class="user-list-chat">
                        <table>
                            @for ($i = 0; $i < count($roomList); $i++)
                                <tr>
                                    <td class="chat-button-{{$roomList[$i][0]->name}}">
                                        <button class="button" id="btn-chat"
                                                value="{{$roomList[$i][0]->name}}"
                                                onclick="goToChat({{auth()->user()->rooms[0]->room_id}})"
                                        >{{$roomList[$i][0]->name}}</button>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                        <div class="chatField">
                            <textarea class='form-control chatText' rows="10" readonly="readonly"></textarea>
                            <hr>
                            <input type="text" class="form-control sendText" value="Input your text here">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
