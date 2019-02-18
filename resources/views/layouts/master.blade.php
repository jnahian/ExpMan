<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ isset($title) ? "$title :: " : ""  }} {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset("svg/expensive.svg") }}">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("css/materialize.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset("css/style.css") }}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<div class="navbar-fixed">
    <div class="progress">
        <div class="determinate" style="width: 0"></div>
    </div>
    <nav class="cyan lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="{{ url('/') }}" class="brand-logo">
                <img src="{{ asset("svg/expensive.svg") }}" alt="{{ config('app.name', 'Laravel') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

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
                        <a href="{{ url()->previous() }}" class="tooltipped" data-position="left" data-tooltip="পূর্ববর্তী পাতা">
                            <i class="material-icons">arrow_back</i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:">
                            <i class="material-icons">account_circle</i>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="logout-wrap">
                        <a href="javascript:" onclick="jLogoutConfirm(this)"> {{-- event.preventDefault(); document.getElementById('logout-form').submit(); --}}
                            <i class="material-icons">power_settings_new</i>
                            সাইন আউট
                        </a>

                        <div class="confirm-logout" onclick="jLogoutCancel(this)">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <h3>আপনি সাইন আউট করতে চাচ্ছেন, আপনি কি নিশ্চিত?</h3>
                                <button type="submit" class="btn orange darken-3"><span class="material-icons">power_settings_new</span> সাইন আউট</button>
                                <button type="button" class="btn grey" onclick="jLogoutCancel(this)"><span class="material-icons">close</span> বাদ দিন</button>
                            </form>
                        </div>
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
<div class="section cyan lighten-5" id="index-banner">
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
<script src="{{ asset("js/submitter.js") }}"></script>

@stack('page-js')

</body>
</html>
