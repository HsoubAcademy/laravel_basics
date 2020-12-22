<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', '')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm" dir="rtl">
            <div class="container">
                <a class="navbar-brand mr-0" href="{{ url('/projects') }}">
                    <h4>{{ config('app.name', 'Laravel') }}</h4>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item mr-4">
                            <a class="btn btn-light" href="{{ route('register') }}">{{ __('تسجيل جديد') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown d-flex align-items-center">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-right" href="/profile">الملف الشخصي</a>
                                <a class="dropdown-item text-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('تسجيل الخروج') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <a href="/profile"><img class="user-image" src="{{ asset(auth()->user()->image) }}"></a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container" id="container">
                @yield('content')
            </div>
        </main>

        <footer class="footer" dir="rtl">
            <div class="container">
            <div class="col text-center">
                <a class="font-weight-bold" href="https://academy.hsoub.com/learn/php-web-application-development/">
                    <img src="{{  asset('images/hsoubacademy.png') }}" width="24px" class="ml-2">
                    دورة تطوير تطبيقات الويب باستخدام لغة PHP
                </a>
            </div>
            </div>
        </footer>
    </div>
</body>

</html>