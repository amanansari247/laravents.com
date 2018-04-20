@extends('layouts.default')

@section('page_title')
    Edit "{{ $hackathon->title }}"
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <main class="py-4">
        <div class="container">
            <edit-hackathon :hackathonid="{{ $hackathon->id }}"></edit-hackathon>
        </div>
    </main>
@endsection

@push('footer_scripts')

@endpush