@extends('layouts.default')

@section('page_title')
    Login
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-login mx-auto">
                <div class="text-center mb-6">
                    <span class="logo-text">{{ config('app.name') }}</span>
                </div>
                <form class="card" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="card-body p-6">
                        <div class="card-title">{{ __('Login') }}</div>
                        <div class="form-group">
                            <label class="form-label">{{ __('E-Mail Address') }}</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Password
                                <a href="{{ route('password.request') }}" class="float-right small">{{ __('Forgot Your Password?') }}</a>
                            </label>

                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword1" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="custom-control-label">{{ __('Remember Me') }}</span>
                            </label>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                        </div>
                    </div>
                </form>
                <div class="text-center text-muted">
                    Don't have account yet? <a href="{{ route('register') }}">Sign up</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush