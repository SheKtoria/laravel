@extends('layouts.app')
@section('content')

    <div class="card update">
        <div class="card-header-edit">{{ __('Edit your personal info') }}</div>
        <div class="card-body">

            <form method="POST" action="">
                @csrf
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right registerLable">{{ __('First Name') }}</label>

                        <div class="col-md-6 ">
                            <input class="form-control field firstName" name="firstName" type="text"
                                   value="{{$user->first_name}}">
                            @error('firstName')
                            <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right registerLable">{{ __('Last Name') }}</label>

                        <div class="col-md-6 ">
                            <input class=" form-control field lastName" name="lastName" type="text"
                                   value="{{$user->last_name}}">
                            @error('lastName')
                            <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right registerLable">{{ __('Birthday') }}</label>

                        <div class="col-md-6 ">
                            <input class="birthday form-control field" name="birthday" type="date"
                                   value="{{$user->birthday}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right registerLable">{{ __('Address') }}</label>

                        <div class="col-md-6 ">
                            <input class="address form-control field" name="address" type="text"
                                   value="{{$user->address}}">
                            @error('address')
                            <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right registerLable">{{ __('Phone Number') }}</label>

                        <div class="col-md-6 ">
                            <input class="number form-control field" name="number" type="text"
                                   value="{{$user->phone_number}}">
                            @error('number')
                            <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right registerLable">{{ __('Other Information') }}</label>

                        <div class="col-md-6 ">
                            <input class="other form-control field" name="other" type="text"
                                   value="{{$user->ex_information}}">

                        </div>
                    </div>
                <button type="submit" class="button edit">Edit</button>
            </form>
        </div>
    </div>
@endsection
