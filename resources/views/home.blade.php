@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col s2">
            <ul class="collection side-nav">
                <li class="collection-item"><a href="#!"><i class="material-icons">dashboard</i> Dashboard</a></li>
                <li class="collection-item"><a href="#!"><i class="material-icons">attach_money</i> Incomes</a></li>
                <li class="collection-item"><a href="#!"><i class="material-icons">money_off</i> Expanses</a></li>
                <li class="collection-item"><a href="#!"><i class="material-icons">assignment</i> Reports</a></li>
            </ul>
        </div>
        <div class="col s10">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">Dashboard</div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@endsection
