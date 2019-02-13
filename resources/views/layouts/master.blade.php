<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("css/materialize.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset("css/style.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<div class="navbar-fixed">
    <nav class="cyan lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo">{{ config('app.name', 'Laravel') }}</a>
            <ul class="right hide-on-med-and-down">
                @guest
                    <li>
                        <a href="{{ route('login') }}">
                            <i class="material-icons">lock_open</i>সাইন ইন</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">
                                <i class="material-icons">person_add</i>রেজিস্ট্রেশন </a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="#">
                            <i class="material-icons">account_circle</i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="material-icons">power_settings_new</i>
                            সাইন আউট
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>
<div class="section" id="index-banner">
    <div class="container">

        @yield('content')

    </div>
</div>

<footer class="page-footer grey lighten-1">
    <div class="footer-copyright">
        <div class="container center-align">
            &copy; {{ bijoyToAvro(date('Y')) }} || <a class="blue-text lighten-3" href="http://jnahian.com">নাহিয়ান</a> এর ভালবাসা দিয়ে তৈরি
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{ asset("js/materialize.js") }}"></script>
<script src="{{ asset("js/init.js") }}"></script>

</body>
</html>
