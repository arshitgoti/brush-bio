@extends('layouts.app')
@section('page-title')
    Welcom Page
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <img src="images/main-logo.png" class="register-logo">
    </div>
    




@guest
    <div class="welcome-heading1">
        One link at the center of your art career.
    </div>
    <div class="welcome-heading2">
        Provide potential clients instant access to all your information, available artwork and social media channels</div>

    <div class="welcome-heading3">Already on Brush.bio? <a href="https://brush.bio/login">Log in</a></div>

     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.set.slug') }}" id="user-name-check-form">
                        @csrf
                        <input type="hidden" name="isSimpleForm" value="yes">

                        <div class="form-group row username-container">
                            <div for="user_name" class="col-md-4 col-form-label text-md-right website-label">Brush.bio /</div>

                            <div class="col-md-6 custom-welcome-container">
                                <div class="user-input-container">
                                    <input placeholder="Username" id="user_name" type="text" class="username-input form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                                    <span class="invalid-feedback invalid_user_name_feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                    @error('user_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnSubmitRegister">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@else

    <div class="welcome-heading1">It seems that you are already Logged in. <a href="https://www.brush.bio/me/dashboard">Click here to go to the dashboard.</a></div>

@endguest    
</div>
@endsection
