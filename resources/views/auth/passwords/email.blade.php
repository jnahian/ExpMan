@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col s8 offset-s2">

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">{{ __('Reset Password') }}</div>
                        <hr>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <label for="email">{{ __('E-Mail Address') }}:</label>
                            </div>
                        </div>

                    </div>
                    <div class="card-action center-align">
                        <button type="submit" class="btn orange">
                            <i class="material-icons">vpn_key</i>
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
