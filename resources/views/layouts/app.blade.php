<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
      window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="bg-white px-8 pt-2 shadow-md">
            <div class="-mb-px flex justify-center">
                <a class="no-underline text-grey-dark hover:text-main-purple active:text-main-purple active:border-b-2 hover:border-b-2 active:border-indigo-dark hover:border-indigo-dark uppercase tracking-wide font-bold text-xs py-3 mr-8" href="#">
                    Shared Hosts
                </a>
                <a class="no-underline text-grey-dark hover:text-main-purple active:text-main-purple active:border-b-2 hover:border-b-2 active:border-main-purple hover:border-main-purple uppercase tracking-wide font-bold text-xs py-3 mr-8" href="#">
                    PaaS
                </a>
                <a class="no-underline text-grey-dark hover:text-main-purple active:text-main-purple active:border-b-2 hover:border-b-2 active:border-main-purple hover:border-main-purple uppercase tracking-wide font-bold text-xs py-3 mr-8" href="#">
                    Managed Hosts
                </a>
                <a class="no-underline text-grey-dark hover:text-main-purple active:text-main-purple active:border-b-2 hover:border-b-2 active:border-main-purple hover:border-main-purple uppercase tracking-wide font-bold text-xs py-3 mr-8" href="#">
                    Operating Systems
                </a>
                <a class="no-underline text-grey-dark hover:text-main-purple active:text-main-purple active:border-b-2 hover:border-b-2 active:border-main-purple hover:border-main-purple uppercase tracking-wide font-bold text-xs py-3 mr-8" href="#">
                    PHP 7.2
                </a>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="flex justify-center pb-8">
            <p class="align-center text-grey-darker font-sans text-xs">Copyright © 2018 Matt Trask. Contributions from the community.</p>
        </footer>
    </div>
</body>
</html>
