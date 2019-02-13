@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col s2">
            <ul class="collection side-nav">
                <li class="collection-item"><a href="#!"><i class="material-icons">dashboard</i> ড্যাশবোর্ড</a></li>
                <li class="collection-item"><a href="#!"><i class="material-icons">attach_money</i> উপার্জন সমূহ </a></li>
                <li class="collection-item"><a href="#!"><i class="material-icons">money_off</i> খরচ সমূহ</a></li>
                <li class="collection-item"><a href="#!"><i class="material-icons">assignment</i> রিপোর্টস</a></li>
            </ul>
        </div>
        <div class="col s10">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">ড্যাশবোর্ড</div>

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
