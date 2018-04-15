@extends('layouts.default')

@section('page_title')
    Conferences
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Conferences</h1>
        </div>

        <conference-list :per_page="12" :with_pagination="true"></conference-list>
    </div>
@endsection

@push('footer_scripts')

@endpush