@extends('layouts.default')

@section('page_title')
    My Account Settings
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <br>
    <div class="container">
        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
@endsection

@push('footer_scripts')

@endpush