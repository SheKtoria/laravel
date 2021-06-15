<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="card">
    <div class="card-header-edit">{{ __('Edit your personal information') }}</div>
    <div class="card-body">
        <form method="POST" action="">
            @csrf
            @foreach ($data as $user)
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                    <div class="col-md-6 ">
                        <input class="form-control field firstName" name="firstName" type="text" value="{{$user->first_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                    <div class="col-md-6 ">
                        <input class=" form-control field lastName" name="lastName" type="text" value="{{$user->last_name}}">
                    </div>
                </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6 ">
                                <input class="birthday form-control field" name="birthday" type="text" value="{{$user->birthday}}">
                            </div>
                        </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                    <div class="col-md-6 ">
                                        <input class="address form-control field" name="address" type="text" value="{{$user->address}}">
                                    </div>
                                </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                            <div class="col-md-6 ">
                                                <input class="number form-control field" name="number" type="text" value="{{$user->phone_number}}">
                                            </div>
                                        </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Other Information') }}</label>

                                                    <div class="col-md-6 ">
                                                        <input class="other form-control field" name="other" type="text"
                                                               value="{{$user->ex_information}}">

                                                    </div>
                                                </div>
                                                        @endforeach
                                                        <button type="submit" class="button edit">Edit</button>
        </form>
    </div>
</div>
