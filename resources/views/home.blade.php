@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col s10">
            <div class="card">
                <div class="card-title">ড্যাশবোর্ড</div>
                <div class="card-content">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    আপনি লগ ইন আছেন!
                </div>
            </div>
        </div>
    </div>
@endsection
