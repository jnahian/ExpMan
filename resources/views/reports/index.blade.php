@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10">

            <div class="card">
                @include('elements.preloader')
                <div class="card-title">
                    {{ $title }}
                </div>
                <div class="card-content center-align">

                    <a href="{{ route('report.daily') }}" class="btn-large light-blue">
                        <span class="material-icons">assignment</span>
                        Daily Report
                    </a>

                    <a href="{{ route('report.monthly') }}" class="btn-large light-blue">
                        <span class="material-icons">assignment</span>
                        Monthly Report
                    </a>

                </div>
                <div class="card-action center-align">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
