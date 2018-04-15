@extends('layouts.default')

@section('page_title')
    Reset Password
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <span class="logo-text">{{ config('app.name') }}</span>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="card" method="post" action="{{ route('password.email') }}">
                        @csrf
                        <div class="card-body p-6">
                            <div class="card-title">{{ __('Reset Password') }}</div>
                            <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
                            <div class="form-group">
                                <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('email') }}" name="email" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        Forget it, <a href="{{ url('/login') }}">send me back</a> to the sign in screen.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer_scripts')

@endpush