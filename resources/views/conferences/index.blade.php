@extends('layouts.default')

@section('page_title')
    Conferences
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <main class="py-4">
        <div class="container">
            <conference-list></conference-list>
        </div>
    </main>
@endsection

@push('footer_scripts')

@endpush