@extends('layouts.default')

@section('page_title')
    Home
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <main class="py-4">
        <dashboard :userid="{{ Auth::user()->id }}"></dashboard>
    </main>
@endsection

@push('footer_scripts')

@endpush