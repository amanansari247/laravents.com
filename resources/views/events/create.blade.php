@extends('layouts.default')

@section('page_title')
    Submit your event
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="page-header">
                <h1>Submit your event</h1>
            </div>

            <create-event></create-event>
        </div>
    </main>
@endsection

@push('footer_scripts')

@endpush