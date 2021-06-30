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
                            <th>Birthday</th>
                            <th>Address</th>
                            <th>Ex Information</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr class="user_info">
                                <td class="id" name="id">{{$user->id}}</td>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>{{$user->birthday}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->ex_information}}</td>
                                <td>
                                    <button class="btn btn-color" onclick="startChat({{$user->id}}, {{(auth()->user())->id}})">Create chat</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
