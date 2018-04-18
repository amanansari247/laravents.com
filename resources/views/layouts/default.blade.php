<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <link rel="canonical" href="@yield('canonical', request()->url())" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') - {{ config('app.name') }}</title>

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    <!-- Prefetch -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://use.fontawesome.com/">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    @stack('header_scripts')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @stack('header_styles')

    <script>
        window.Laravents = <?php echo json_encode(array_merge(
            App\Configuration\Laravents::scriptVariables(), []
        )); ?>;
    </script>
</head>
<body>
    <div id="app" class="page">
        @if(request()->path() == 'login')
            <div class="page-single">
                @yield('content')
            </div>
        @elseif(request()->path() == 'register')
            <div class="page-single">
                @yield('content')
            </div>
        @elseif(request()->path() == 'password/reset')
            <div class="page-single">
                @yield('content')
            </div>
        @else
            <div class="page-main">
                @include('_includes.navigation')

                @include('alert::bootstrap')

                @yield('content')

                @include('_includes.footer')
            </div>
        @endif
    </div>

    @if(env('APP_ENV') == 'production')
        <script type="text/javascript">
            var gaProperty = {!! env('GA_KEY') !!};
            var disableStr = 'ga-disable-' + gaProperty; if (document.cookie.indexOf(disableStr + '=true') > -1) {
                window[disableStr] = true;
            }

            function gaOptout() {
                document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/'; window[disableStr] = true; alert('Das Tracking durch Google Analytics wurde in Ihrem Browser für diese Website deaktiviert.');
            }
        </script>
    @endif

    @guest
        <script>
            var botmanWidget = {
                frameEndpoint: 'https://larvis.laravents.com/botman/widget',
                chatServer: 'https://larvis.laravents.com/botman',
                mainColor: '#ffffff',
                bubbleBackground: '#ffffff',
                title: 'Larvis',
                bubbleAvatarUrl: 'https://larvis.laravents.com/robot.png',
                desktopHeight: 600,
                introMessage: 'Welcome to laravents.com! 👋 <br><br> I´m Larvis. Your personal 🤖 when it comes to any laravel related events on the 🌍. <br><br> Here´s a 📝 with commands, i understand: <br><br> - Show me conferences <br> - Show me meetups <br> - Show me hackathons',
                placeholderText: 'Ask me about any events for laravel..',
                aboutLink: 'https://github.com/laravents/larvis'
            };
        </script>
    @else
        <script>
            var botmanWidget = {
                frameEndpoint: 'https://larvis.laravents.com/botman/widget',
                chatServer: 'https://larvis.laravents.com/botman',
                mainColor: '#ffffff',
                bubbleBackground: '#ffffff',
                title: 'Larvis',
                bubbleAvatarUrl: 'https://larvis.laravents.com/robot.png',
                desktopHeight: 600,
                introMessage: 'Hello, {!! Auth::user()->name !!}! 👋 <br><br> I´m Larvis. Your personal 🤖 when it comes to any laravel related events on the 🌍. <br><br> Here´s a 📝 with commands, i understand: <br><br> - Show me conferences <br> - Show me meetups <br> - Show me hackathons',
                placeholderText: 'Ask me about any events for laravel..',
                aboutLink: 'https://github.com/laravents/larvis',
                userId: {!! Auth::user()->id !!}
            };
        </script>
    @endguest
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
</body>
</html>
