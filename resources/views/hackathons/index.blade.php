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
            <h1>Hackathons</h1>
        </div>

        <hackathon-list :per_page="12" :with_pagination="true"></hackathon-list>
    </div>
@endsection

@push('footer_scripts')

@endpush