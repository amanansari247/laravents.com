@extends('layouts.default')

@section('page_title')
    {{ $conference->title }}
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <single-conference :conferenceid="{{ $conference->id }}"></single-conference>
@endsection

@push('footer_scripts')

@endpush