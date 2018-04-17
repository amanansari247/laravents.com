@extends('layouts.default')

@section('page_title')
    {{ $meetup->title }}
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <single-meetup :meetupid="{{ $meetup->id }}"></single-meetup>
@endsection

@push('footer_scripts')

@endpush