@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card chatWindow">
                <div class="card-header">{{ __('Chats') }}
                </div>
                @if ($roomList !== null)
                    @auth
                        <div class="row chat-card-inner">
                            <div class="user-list-chat">
                                <table>
                                    @for ($i = 0; $i < count($roomList); $i++)
                                        <tr>
                                            <td class="chat-button-{{$roomList[$i][0]->name}}">
                                                <button class="button" id="btn-chat"
                                                        value="{{$roomList[$i][0]->name}}"
                                                        onclick="goToChat({{auth()->user()->rooms[$i]->id}})"
                                                >{{$roomList[$i][0]->name}}</button>
                                            </td>
                                        </tr>
                                    @endfor
                                </table>
                            </div>
                            <div>
                                <private-chat :room="{{$room}}"></private-chat>
                            </div>
                        </div>
                    @endauth
                @else
                    <div class="chat-dont-created">
                        You haven't created any chat yet
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
