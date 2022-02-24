@extends('layouts.app')

@section('content')

<link rel='stylesheet' type='text/css' media='screen' href='https://swiitch.in/digicard/public/css/front_style.css'>
<style type="text/css">
.col-form-label, .form-check-label, .form-control, .btn-primary, .btn-link, .card-header{
    font-family: 'niveau_grotesklight';
    font-size: 14px ! important;
}
span.invalid-feedback {
    font-family: 'niveau_grotesklight';
    font-size: 14px ! important;
}
</style>

<div class="container">
    <div class="row justify-content-center">
            <img src="https://www.brush.bio/images/main-logo.png" class="login-logo">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
