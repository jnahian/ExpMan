@extends('layouts.master')

@section('content')
    <div class="row">

        @include('elements.sideNav')

        <div class="col s10">
            <div class="card">
                <div class="card-content">
                    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div id="curve_chart" style="width: 100%; height: 500px"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var barData = [];

        barData.push(['মাস', 'আয়', 'ব্যায়', 'ব্যালেন্স']);

        @foreach($reports as $report)

        barData.push([{{ $report['month'] }}, {{ $report['income'] }}, {{ $report['expense'] }}, {{ $report['profit'] }}]);

        @endforeach
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(barData);

            var options = {
                title: 'আয় ব্যয় কর্মক্ষমতা',
                curveType: 'function',
                legend: {position: 'bottom'}
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages': ['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(barData);

            var options = {
                chart: {
                    title: 'মাসিক আয় ব্যায়ের হিসাব ',
                    subtitle: 'আয়, ব্যায়, ব্যালেন্স',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

@endpush
