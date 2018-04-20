@extends('layouts.default')

@section('page_title')
    {{ $hackathon->title }}
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <single-hackathon :hackathonid="{{ $hackathon->id }}"></single-hackathon>
@endsection

@push('footer_scripts')

@endpush