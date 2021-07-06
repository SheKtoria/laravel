@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card chatWindow">
                <div class="card-header">{{ __('Chat') }}
                </div>
                @if (!empty($roomList))
                    @auth
                        <div class="row chat-card-inner">
                            <div class="user-list-chat">
                                <table>
                                    @foreach ($roomList as $key => $rl)
                                        <tr>
                                            <td class="chat-button-{{$rl[0]->name}}">
                                                <button class="button" id="btn-chat"
                                                        value="{{$rl[0]->name}}"
                                                        onclick="goToChat({{auth()->user()->rooms[$key]->id}})"
                                                >{{$rl[0]->name}}</button>
                                            </td>
                                        </tr>
                                        @endforeach

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
