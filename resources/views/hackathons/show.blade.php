@extends('layouts.default')

@section('page_title')
    {{ $hackathon->title }}
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <single-hacakathon :hackathonid="{{ $hackathon->id }}"></single-hacakathon>
@endsection

@push('footer_scripts')

@endpush