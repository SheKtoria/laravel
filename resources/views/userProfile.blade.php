@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user">
                    <div class="card-header">{{$user->name}}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="map">
                                <div class="info">{{ __('Personal information') }}</div>
                                <ul class="list">
                                    <div class="userTitles">{{__("First Name")}}</div>
                                    <li class="personalInfoFirstname userPersonalInfo" contenteditable="false"
                                        type="none">{{ $user->first_name }}</li>
                                    <div class="userTitles">{{__("Last Name")}}</div>
                                    <li class="personalInfoLastname userPersonalInfo" contenteditable="false"
                                        type="none">{{$user->last_name}}</li>
                                    <div class="userTitles">{{__("Birthday")}}</div>
                                    <li class="personalInfoBirthday userPersonalInfo" contenteditable="false"
                                        type="none">{{$user->birthday}}</li>
                                    <div class="userTitles">{{__("Address")}}</div>
                                    <li class="personalInfoAddress userPersonalInfo" contenteditable="false"
                                        type="none">{{$user->address}}</li>
                                    <div class="userTitles">{{__("Phone number")}}</div>
                                    <li class="personalInfoNumber userPersonalInfo" contenteditable="false"
                                        type="none">{{$user->phone_number}}</li>
                                    <div class="userTitles">{{__("Other information")}}</div>
                                    <li class="personalInfoOther userPersonalInfo" contenteditable="false"
                                        type="none">{{$user->ex_information}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
