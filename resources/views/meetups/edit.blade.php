@extends('layouts.default')

@section('page_title')
    Edit "{{ $meetup->title }}"
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <main class="py-4">
        <div class="container">
            <edit-meetup :meetupid="{{ $meetup->id }}"></edit-meetup>
        </div>
    </main>
@endsection

@push('footer_scripts')

@endpush