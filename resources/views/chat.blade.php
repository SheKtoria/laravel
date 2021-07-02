@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card  chat-card">
                    <div
                        class="card-header p-3 mb-2 bg-success text-white AccountName">{{ __('Public chat') }}
                    </div>
                    <div class="row chat-card-inner">
                        <div class="user-list-chat">
                            <table>
                                @for ($i = 0; $i < count($roomList); $i++)
                                    <tr>
                                        <td class="chat-button-{{$roomList[$i][0]->rooms[0]['id']}}">
                                            <button class="button btn-color btn-chat" id="btn-chat"
                                                    value="{{$roomList[$i][0]->name}}"
                                                    onclick="goToChat({{$roomList[$i][0]->rooms[0]['id']}})"
                                            >{{$roomList[$i][0]->name}}</button>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
