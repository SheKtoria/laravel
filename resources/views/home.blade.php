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
                                <?php foreach ($users as $user):?>
                                    <input class="personalInfo" readonly="readonly" name="name" type="text" value="<?= $user->name?>" >
                                    <br>
                                    <input class="personalInfo" readonly="readonly" name="name" type="text" value="<?= $user->email?>" >
                                    <br>
                                    <input class="personalInfo" readonly="readonly" name="name" type="text" value="<?= $user->created_at?>" >
                                    <br>
                                    <input class="personalInfo" readonly="readonly" name="name" type="text" value="<?= $user->id?>" >
                                    <br>
                                <?php endforeach; ?>
                            </div>
                            <div class="cont">
                                <div class="info">{{ __('Actions') }}</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
