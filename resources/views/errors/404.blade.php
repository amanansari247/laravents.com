@extends('layouts.default')

@section('page_title')
    404
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="container text-center py-8">
        <div class="display-1 text-muted mb-5">404</div>
        <h1 class="h2 mb-3">Oops.. You just found an error page..</h1>
        <p class="h4 text-muted font-weight-normal mb-7">We are sorry but our service is currently not available…</p>
        <a class="btn btn-primary" href="javascript:history.back()">
            <i class="fe fe-arrow-left mr-2"></i>Go back
        </a>
    </div>
@endsection

@push('footer_scripts')

@endpush