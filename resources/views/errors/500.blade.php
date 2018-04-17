@extends('layouts.default')

@section('page_title')
    500
@endsection

@push('styles')

@endpush

@push('header_scripts')

@endpush

@section('content')
    <br>
    <div class="container text-center">
        <div class="display-1 text-muted mb-5">500</div>
        <h1 class="h2 mb-3">Oops.. You just found an error page..</h1>
        <p class="h4 text-muted font-weight-normal mb-7">We are sorry but our service is currently not available…</p>
        <a class="btn btn-primary" href="javascript:history.back()">
            <i class="fe fe-arrow-left mr-2"></i>Go back
        </a>

        @if(app()->bound('sentry') && !empty(Sentry::getLastEventID()))
            <div class="subtitle">Error ID: {{ Sentry::getLastEventID() }}</div>

            <!-- Sentry JS SDK 2.1.+ required -->
            <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

            <script>
                Raven.showReportDialog({
                    eventId: '{{ Sentry::getLastEventID() }}',
                    // use the public DSN (dont include your secret!)
                    dsn: {{ env('SENTRY_PUBLIC_DSN') }},
                    user: {
                        'name': 'Jane Doe',
                        'email': 'jane.doe@example.com',
                    }
                });
            </script>
        @endif
    </div>
@endsection

@push('footer_scripts')

@endpush