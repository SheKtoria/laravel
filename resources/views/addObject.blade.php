@extends('layouts.app')
@section('content')

    <div class="card update">
        <div class="card-header-edit">{{ __('Add new object to base') }}</div>
        <div class="card-body">

            <form method="POST" action="">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right loginLable">{{ __('Object Name') }}</label>

                    <div class="col-md-6 ">
                        <input class=" form-control field objectName" name="objectName" type="text" value="">
                        @error('objectName')
                        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right loginLable" >{{ __('Destination') }}</label>

                    <div class="col-md-6 ">
                        <input class=" form-control field destination" name="destination" type="text" value="">
                        @error('destination')
                        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right loginLable">{{ __('Contact information') }}</label>

                    <div class="col-md-6 ">
                        <input class="contact form-control field" name="contact" type="text"
                               value="">
                        @error('contact')
                        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right loginLable">{{ __('Other information') }}</label>
                    <div class="col-md-6 ">
                        <input class="otherInfo form-control field" name="otherInfo" type="text" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right loginLable">{{ __('Category') }}</label>

                    <div class="col-md-6 ">
                        <select class="selectCategory " size="1" name="selectCategory">
                            @foreach ($categories as $category)
                                <option class="optionCategory"> {{$category->id . ' ' . $category->category}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <button type="submit" class="button edit" >Add</button>
            </form>
        </div>
    </div>
@endsection
