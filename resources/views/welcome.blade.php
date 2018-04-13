@extends('layouts.default')

@section('page_title')
    Welcome
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3 text-center">Welcome to laravents!</h1>
            <p class="text-center">
                Find laravel related events such as conferences, meetups, hackathons and more! <br>
                If you host a laravel related event, feel free to submit your event to our list.
            </p>

            <div class="row align-items-center">
                <div class="col-md-6 offset-md-3">
                    <a href="{{ url('/events/create') }}" class="btn btn-danger btn-lg btn-block">Submit your meetup / conference / hackathon</a>
                </div>
            </div>

            {{--<p class="text-center">--}}
                {{--<home-search></home-search>--}}
            {{--</p>--}}
        </div>
    </div>

    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Conferences</h3>
                    <conference-list :per_page="12" :with_pagination="true"></conference-list>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('footer_scripts')

@endpush