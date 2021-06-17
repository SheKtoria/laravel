@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user objectPage">
                    <div class="card-header">{{ __('Main page') }}</div>
{{--                    <form class="card-body objectForm" method="POST" action="">--}}
                        <div
                            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                            @foreach($objects as $object)
                                <div class="objectInfo">
                                    <div class="row">
                                        <div class="column-left">
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Name') }}</label>
                                            <text class="objectData">{{$object->object_name}}</text>
                                            <br>
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Author') }}</label>
                                            <text class="objectData">{{$object->users->name}}</text>
                                        </div>
                                        <div class="column-right">
                                            <label for="name"
                                                   class="col-md-3 col-form-label">{{ __('Destination') }}</label>
                                            <text class="objectData">{{$object->destination}}</text>
                                            <br>
                                            <label for="name"
                                                   class="col-md-3 col-form-label">{{ __('Other Information') }}</label>
                                            <text class="objectData">{{$object->other_info}}</text>
                                            <br>
                                            <label for="name" class="col-md-3 col-form-label">{{ __('Type') }}</label>
                                            <text class="objectData">{{$object->type}}</text>
                                        </div>
                                        <form class="objectForm" method="POST" action="/change">
                                            @csrf
                                        <div class="column-center">
                                            <label for="name"
                                                   class="col-md-3 col-form-label">{{ __('Status') }}</label>
                                            <input class="status" readonly="readonly" name="status"
                                                   value="{{$object->status}}">
                                            <br>
                                                <input type="hidden" class="id" name="id" value="{{$object->id}}">
                                                <button type="submit" class="edit-button button btn btn-primary">
                                                    {{ __('Change status') }}
                                                </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
