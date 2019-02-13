@extends('layouts.master')
@section('content')
    <br><br>
    <h1 class="header center green-text">{{ config('app.name', 'Laravel') }}</h1>
    <div class="row center">
        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
    </div>
    <div class="row center">
        <a href="{{ route('login') }}" class="btn-large waves-effect waves-light orange">
            <i class="material-icons">lock_open</i>
            {{ __('Login') }}
        </a>
    </div>
    <br><br>
@endsection
