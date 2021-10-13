@extends('admin.layouts.master')
@section('content')
    <canvas id="canvas" width="604" height="302" class="chartjs-render-monitor"
            style="display: block; width: 604px; height: 302px;"></canvas>
@endsection

@push('scripts')
    <script>
        var data = {!! $data !!};

        var lineChartData = {
            labels: data.labels,
            datasets: [{
                label: data.datasets[0].label,
                borderColor: '#37a2eb',
                backgroundColor: '#37a2eb',
                lineTension:0,
                fill: false,
                data: data.datasets[0].data,

            }, {
                label: data.datasets[1].label,
                borderColor: '#f96284',
                backgroundColor: '#f96284',
                lineTension:0,
                fill: false,
                data: data.datasets[1].data,

            }]
        };

        window.onload = function () {
            var ctx = document.getElementById('canvas').getContext('2d');
            window.myLine = Chart.Bar(ctx, {
                data: lineChartData,
                options: {
                    responsive: true,
                    hoverMode: 'index',
                    stacked: false,
                    title: {
                        display: true,
                        text: data.title,
                    },
                    scales: {
                        yAxes: [{
                            type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                            display: true,
                            position: 'left',
                        }],
                    }
                }
            });
        };


    </script>
@endpush
