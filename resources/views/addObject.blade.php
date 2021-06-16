<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="card">
    <div class="card-header-edit">{{ __('Add new object to base') }}</div>
    <div class="card-body">

        <form method="POST" action="">
            @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Object Name') }}</label>

                    <div class="col-md-6 ">
                        <input class="form-control field firstName" name="firstName" type="text" value="">
                        @error('firstName')
                        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Destination') }}</label>

                    <div class="col-md-6 ">
                        <input class=" form-control field lastName" name="lastName" type="text" value="">
                        @error('lastName')
                        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact information') }}</label>

                    <div class="col-md-6 ">
                        <input class="birthday form-control field" name="birthday" type="text"
                               value="">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Other information') }}</label>

                    <div class="col-md-6 ">
                        <input class="address form-control field" name="address" type="text" value="">
                        @error('address')
                        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                    <div class="col-md-6 ">
                        <input class="number form-control field" name="number" type="text" value="">
                        @error('number')
                        <span role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                </div>
            <button type="submit" class="button edit">Edit</button>
        </form>
    </div>
</div>
