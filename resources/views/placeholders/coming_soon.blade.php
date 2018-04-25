@extends('layouts.default')

@section('page_title')
    Coming soon
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="container text-center py-8">
        <div class="display-1 text-muted mb-5">Coming soon..</div>
        <h1 class="h2 mb-3">Oops.. You just found an error page..</h1>
        <p class="h4 text-muted font-weight-normal mb-7">This feature is currently in development. Please come back soon.</p>
        <a class="btn btn-primary" href="{{ env('APP_URL') }}">
            <i class="fe fe-arrow-left mr-2"></i>Go to homepage
        </a>
    </div>
@endsection

@push('footer_scripts')

@endpush