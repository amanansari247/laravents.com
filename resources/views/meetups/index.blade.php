@extends('layouts.default')

@section('page_title')
    Meetups
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Meetups</h1>
        </div>

        <meetup-list :per_page="12" :with_pagination="true"></meetup-list>
    </div>
@endsection

@push('footer_scripts')

@endpush