@extends('layouts.default')

@section('page_title')
    Edit "{{ $conference->title }}"
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <main class="py-4">
        <div class="container">
            <edit-conference :conferenceid="{{ $conference->id }}"></edit-conference>
        </div>
    </main>
@endsection

@push('footer_scripts')

@endpush