@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">

            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">
                        {{ $title }}
                        <a href="{{ route('cc-trans.create') }}" class="btn-small green right"><i class="material-icons">add</i> নতুন লেনদেন </a>
                    </div>
                    <div class="row center-align">
                        {!! Form::open(['route' => 'cc-trans.index', 'method' => 'GET']) !!}
                        <div class="input-field inline">
                            <input id="from" name="from" type="text" class="datepicker">
                            <label for="from">তারিখ হইতে </label>
                        </div>
                        <div class="input-field inline">
                            <input id="to" type="text" name="to" class="datepicker">
                            <label for="to">তারিখ পর্যন্ত </label>
                        </div>
                        <div class="input-field inline">
                            <button type="submit" name="s" value="1" class="btn green"><span class="material-icons">search</span> অনুসন্ধান</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <table class="striped responsive-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>তারিখ</th>
                            <th>ব্যবহারকারী</th>
                            <th>Card</th>
                            <th>লেনদেন পরিমাণ</th>
                            <th class="center-align">স্টেটাস</th>
                            <th class="center-align">সর্বশেষ আপডেট</th>
                            <th class="center-align">একশন্স</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($ccTrans->total())
                            @foreach($ccTrans as $trans)
                                <tr>
                                    <td>{{ ($loop->index + 1) }}</td>
                                    <td>{{ $trans->trans_date->format('d M, Y') }}</td>
                                    <td>{{ $trans->trans_by }}</td>
                                    <td>{{ data_get($cards, $trans->card, '') }}</td>
                                    <td class="right-align">{{ $trans->amount }}</td>
                                    <td class="center-align">
                                        {!! status($trans->status, TRUE) !!}
                                    </td>
                                    <td class="center-align">{{ $trans->updated_at->format('d M, Y h:i A') }}</td>
                                    <td class="center-align delete-wrap">
                                        <a href="{{ route('cc-trans.show', $trans->id) }}" class="btn-floating btn-small waves-effect waves-light green tooltipped"
                                           data-position="top"
                                           data-tooltip="বিস্তারিত দেখুন">
                                            <span class="material-icons">remove_red_eye</span>
                                        </a>

                                        <a href="{{ route('cc-trans.edit', $trans->id) }}" class="btn-floating btn-small waves-effect waves-light cyan tooltipped"
                                           data-position="top"
                                           data-tooltip="পরিবর্তন করুন">
                                            <span class="material-icons">edit</span>
                                        </a>

                                        <a href="javascript:" class="btn-floating btn-small waves-effect waves-light red tooltipped" data-position="top"
                                           data-tooltip="মুছে ফেলুন" onclick="jShowDelete(this)">
                                            <span class="material-icons">delete</span>
                                        </a>

                                        <div class="delete-form" onclick="jCancelDelete(this)">
                                            {!! Form::open(['route' => ['cc-trans.destroy', $trans->id], 'method' => 'DELETE']) !!}
                                            <h3>আপনি এটি মুছে ফেলতে চাচ্ছেন, আপনি কি নিশ্চিত?</h3>
                                            <button type="submit" class="btn red darken-3" onclick="submit_form(this, event)"><span class="material-icons">delete</span> মুছে ফেলুন
                                            </button>
                                            <button type="button" class="btn grey" onclick="jCancelDelete(this)"><span class="material-icons">close</span>বাদ দিন</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="center-align" colspan="7">কোনো আয় খুঁজে পাওয়া যায় নাই।</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-action center-align">
                    {{ $ccTrans->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script>

    </script>
@endpush
