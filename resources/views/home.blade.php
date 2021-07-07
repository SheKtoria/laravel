@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user">
                    <div class="card-header">{{ __('Home page') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="map">
                                <div class="info">{{ __('Personal information') }}</div>
                                <ul class="list">
                                    <div class="titles">{{__("First Name")}}</div>
                                    <li class="personalInfoFirstname personalInfo" contenteditable="false"
                                        type="none">{{ $user->first_name }}</li>
                                    <div class="titles">{{__("Last Name")}}</div>
                                    <li class="personalInfoLastname personalInfo" contenteditable="false"
                                        type="none">{{$user->last_name}}</li>
                                    <div class="titles">{{__("Birthday")}}</div>
                                    <li class="personalInfoBirthday personalInfo" contenteditable="false"
                                        type="none">{{$user->birthday}}</li>
                                    <div class="titles">{{__("Address")}}</div>
                                    <li class="personalInfoAddress personalInfo" contenteditable="false"
                                        type="none">{{$user->address}}</li>
                                    <div class="titles">{{__("Phone number")}}</div>
                                    <li class="personalInfoNumber personalInfo" contenteditable="false"
                                        type="none">{{$user->phone_number}}</li>
                                    <div class="titles">{{__("Other information")}}</div>
                                    <li class="personalInfoOther personalInfo" contenteditable="false"
                                        type="none">{{$user->ex_information}}</li>
                                </ul>
                                <a href="{{route('updateUser')}}" class="edit-button button btn btn-primary">
                                    {{ __('Edit') }}
                                </a>
                            </div>
                            <div class="cont">
                                <div class="info">{{ __('Actions') }}</div>
                                <a href="{{route('newObject')}}" class="edit-button button btn btn-primary">
                                    {{ __('Add new object') }}
                                </a>
                                <a class=" edit-button button btn btn-primary"
                                   href="{{url('https://www.google.ru/maps/@' . $user->latitude . ',' . $user->longitude . ',19z')}}">{{ __('Show location') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
