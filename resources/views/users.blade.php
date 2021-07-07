@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user">
                    <table class="tableUser" width="100%">
                        <div class="card-header">{{ __('Users Database') }}</div>
                        <tr class="header">
                            <th>№</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Profile</th>
                            <th>Chat</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr class="user_info">
                                <td class="id" name="id">{{$user->id}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    <a class="button" href="{{'/user-profile/'.$user->id}}" ><i class="fas fa-id-card-alt"></i></a>
                                </td>
                                <td>
                                    <button class="button" onclick="startChat({{$user->id}}, {{(auth()->user())->id}})"><i class="fas fa-paper-plane"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
