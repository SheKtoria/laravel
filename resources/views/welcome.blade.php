@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user objectPage">
                    <div class="card-header">{{ __('Objects information') }}</div>
                    <div
                        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                        <a href="{{'/main/All'}}" class="category">
                            {{ __('All') }}
                        </a>
                        <a href="{{"/main/hospital"}}" class="category">
                            {{ __('Hospitals') }}
                        </a>
                        <a href="{{"/main/weapon"}}" class="category">
                            {{ __('Weapon shops') }}
                        </a>
                        <a href="{{"/main/shelter"}}" class="category">
                            {{ __('Shelters') }}
                        </a>
                        <a href="{{"/main/market"}}" class="category">
                            {{ __('Shops') }}
                        </a>
                        <a href="{{"/main/gas"}}" class="category">
                            {{ __('Gas stations') }}
                        </a><br>
                        <label for="selectOrder" class="select">Sort by</label>
                        <select class="selectOrder" id="selectOrder" size="1" name="selectOrder">
                            <option class="name" name="object_name" value="object_name">name</option>
                            <option class="destination" name="destination" value="destination">destination</option>
                            <option class="author" name="user_id" value="user_id">author</option>
                        </select>

                        <button type="submit" class="sortButton" onclick="orderObjects()">Sort</button>
                        @foreach($objects as $object)
                            <div class="objectInfo">
                                <div class="row">
                                    <div class="col-md-3 objectColumns">
                                        <label for="name" class="col-md-3 col-form-label">{{ __('Name') }}</label>
                                        <text class="objectData">{{$object->object_name}}</text>
                                        <br>
                                        <label for="name" class="col-md-3 col-form-label">{{ __('Author') }}</label>
                                        <text class="objectData">{{$object->users->name}}</text>
                                    </div>
                                    <div class="col-md-5 objectColumns">
                                        <label for="name"
                                               class="col-md-4 col-form-label">{{ __('Destination') }}</label>
                                        <text class="objectData">{{$object->destination}}</text>
                                        <br>
                                        <label for="name"
                                               class="col-md-4 col-form-label">{{ __('Other Information') }}</label>
                                        <text class="objectData">{{$object->other_info}}</text>
                                        <br>
                                        <label for="name" class="col-md-4 col-form-label">{{ __('Category') }}</label>
                                        <text class="objectData">{{$object->category}}</text>
                                    </div>
                                    <div class="col-md-2 objectColumns">
                                        <label for="name"
                                               class="col-md-5 col-form-label">{{ __('Status') }}</label>
                                        <input class="status{{$object->id}} status" id="status{{$object->id}}"
                                               readonly="readonly" name="status"
                                               value="{{$object->status}}">
                                        <button type="submit" class="edit-button button btn btn-primary"
                                                onclick="changeObjectStatus({{$object->id}})">
                                            {{ __('Change status') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
