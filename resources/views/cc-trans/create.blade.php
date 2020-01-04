@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col m10 s12">
            {!! Form::open(['route' => 'cc-trans.store']) !!}
            <div class="card">
                @include('elements.preloader')
                <div class="card-content">
                    <div class="card-title">{{ $title }}</div>
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input type="text" name="date" id="date" class="datepicker validate">
                            <label for="date">তারিখ <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="particulars" id="particulars" class="validate">
                            <label for="particulars">বিবরণ <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="text" name="trans_by" id="trans_by" class="validate">
                            <label for="trans_by">ব্যবহারকারী <span class="red-text text-lighten-3">*</span></label>
                        </div>

                        <div class="input-field col m6 s12">
                            <input type="number" min="0" name="amount" id="amount" class="validate right-align">
                            <label for="amount">লেনদেন পরিমাণ <span class="red-text text-lighten-3">*</span></label>
                        </div>
                    </div>

                    <div>
                        @foreach($cards as $key => $name)
                            <label>
                                <input type="radio" name="card" value="{{ $key }}"/>
                                <span>{{ $name }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="input-field col m12 s12">
                            <textarea id="remarks" name="remarks" class="materialize-textarea" data-length="200"></textarea>
                            <label for="remarks">মন্তব্য</label>
                        </div>
                    </div>

                    <div>
                        <label>
                            <input type="checkbox" name="emi[status]" id="emi" value="1"/>
                            <span>Is EMI?</span>
                        </label>
                    </div>

                    <div class="row" id="emi-section">
                        <div class="input-field col m6 s12">
                            <input type="text" name="emi[start_date]" id="emi_start_date" class="datepicker validate">
                            <label for="emi_start_date">EMI Start Date <span class="red-text text-lighten-3">*</span></label>
                        </div>


                        <div class="input-field col m6 s12">
                            {!! Form::select('emi[tenor]', $tenors); !!}
                            <label for="status">Tenor</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col m6 s12">
                            {!! Form::select('status', status()); !!}
                            <label for="status">স্টেটাস</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button type="submit" class="btn green" onclick="submit_form(this, event)">
                        <i class="material-icons">save</i>
                        সেভ করুন
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('page-js')
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                autoClose: true,
            });

            $('#remarks').characterCounter();

            $("#emi").on('change', function () {
                if (this.checked) {
                    $('#emi-section').show();
                } else {
                    $('#emi-section').hide();
                }
            });

            $("#emi").trigger('change');
        });


    </script>
@endpush
