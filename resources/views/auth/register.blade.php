@extends('layouts.default')

@section('page_title')
    Register
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
                <form class="card" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="card-body p-6">
                        <div class="card-title">{{ __('Register') }}</div>
                        <div class="form-group">
                            <label class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Enter name" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __('E-Mail Address') }}</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control" placeholder="Password" name="password_confirmation" required>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                        </div>
                    </div>
                </form>
                <div class="text-center text-muted">
                    Already have account? <a href="{{ route('login') }}">Sign in</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush