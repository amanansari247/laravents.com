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

    <div class="container text-center">
        <div class="alert alert-warning" role="alert">
            <strong>Please note:</strong> This site is still in development. Some features are not implemented yet. <br>
            Feel free to <a href="https://github.com/laravents/laravents.com">contribute</a> to Laravents.com!
        </div>
    </div>

    <main class="py-4">
        <div class="container">
            @if(\App\Models\Conference::count())
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center">Recent Conferences</h3>
                        <conference-list :per_page="3" :with_pagination="false"></conference-list>
                    </div>
                </div>
            @endif

            @if(\App\Models\Meetup::count())
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center">Recent Meetups</h3>
                            <meetup-list :per_page="3" :with_pagination="false"></meetup-list>
                        </div>
                    </div>
            @endif

            @if(\App\Models\Hackathon::count())
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center">Recent Hackathons</h3>
                            <hackathon-list :per_page="3" :with_pagination="false"></hackathon-list>
                        </div>
                    </div>
                @endif
        </div>
    </main>
@endsection

@push('footer_scripts')

@endpush
