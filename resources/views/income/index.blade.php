@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10">

            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <div class="row">
                        <table class="striped responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>তারিখ</th>
                                <th>আয়ের উৎস</th>
                                <th>আয়ের পরিমাণ</th>
                                <th>মন্তব্য</th>
                                <th class="center-align">স্টেটাস</th>
                                <th class="center-align">একশন্স</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($incomes)
                                @foreach($incomes as $income)
                                    <tr>
                                        <td>{{ ($loop->index + 1) }}</td>
                                        <td>{{ $income->date->format('d M, Y') }}</td>
                                        <td>{{ $income->source }}</td>
                                        <td class="right-align">{{ $income->amount }}</td>
                                        <td>{{ $income->remarks }}</td>
                                        <td class="center-align">
                                            {!! status($income->status, TRUE) !!}
                                        </td>
                                        <td class="center-align">
                                            <a href="{{ route('income.show', $income->uuid) }}" class="btn-floating btn-small waves-effect waves-light green tooltipped" data-position="top"
                                               data-tooltip="View">
                                                <span class="material-icons">remove_red_eye</span>
                                            </a>
                                            <a href="{{ route('income.edit', $income->uuid) }}" class="btn-floating btn-small waves-effect waves-light cyan tooltipped" data-position="top"
                                               data-tooltip="Edit">
                                                <span class="material-icons">edit</span>
                                            </a>
                                            <a href="{{ route('income.destroy', $income->uuid) }}" class="btn-floating btn-small waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Delete">
                                                <span class="material-icons">delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="center-align" colspan="7">Nothing Found..</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-action">
                    {{ $incomes->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                autoClose: true,
            });
            $('.tooltipped').tooltip();
        });
    </script>
@endpush
