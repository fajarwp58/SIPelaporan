@extends('layouts.main')
@extends('layouts.sidebar')

@section('content')
                <div class="col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Laporan Kehilangan Pada Tahun {{$now}}</h5>
                                <div>

                                </div>
                            </div>
                            <div class="m-t-50" style="height: 330px">
                                <canvas class="chart" id="line-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>



                            <div class="col-md-12 col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5>Jumlah Laporan Kehilangan Berdasarkan Jenis Pada Tahun {{$now}}</h5>
                                            <div>

                                            </div>
                                        </div>
                                        <div class="m-t-50" style="height: 330px">
                                            <canvas class="chart" id="bar-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>



@endsection

@section('js')
    <script src="{{ asset ('assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script type="text/javascript">

        var url = "{{ url('/data/line') }}";
        var url2 = "{{ url('/data/jenis') }}";
        var Data = new Array();
        var Labels = new Array();

        $(document).ready(function(){

            $.get(url, function(response){

                for(var i=0; i<response.month.length; i++ ){
                    Data.push(response.jumlah[i]);
                    Labels.push(response.month[i]);
                }


                var ctx = document.getElementById('line-chart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'line',
                    // The data for our dataset
                    data: {
                        labels: Labels,
                        datasets: [{
                            label: 'jumlah laporan kehilangan',
                            backgroundColor: 'rgba(44,14,179,0)',
                            borderColor: 'rgba(25,165,234,0.77)',
                            pointBackgroundColor: 'rgba(25,165,234,0)',
                            pointBorderColor: 'rgba(187,206,215,0.98)',
                            pointHoverBackgroundColor: 'rgba(35,160,234,0.94)',
                            pointHoverBorderColor: 'rgba(35,160,234,0)',
                            data: Data
                        }]
                    },
                    // Configuration options go here
                    options: {
                        legend: {
                            display: false
                        },
                    }
                });
            });


            $.get(url2, function(data){

                var stnk = data.stnk
                var sim = data.sim
                var kk = data.kk
                var atm = data.atm
                var tab = data.tab
                var paspor = data.paspor
                var ser = data.ser
                var nikah = data.nikah
                var dll = data.dll

                var bar = document.getElementById('bar-chart').getContext('2d');
                var barchart = new Chart(bar, {

                    type: 'bar',
                    // The data for our dataset
                    data: {
                        labels: [ 'STNK', 'SIM', 'KK', 'ATM', 'Buku tabungan', 'Paspor',  'Sertifikat', 'Surat Nikah', 'DLL'],
                        datasets: [{
                            backgroundColor: 'rgba(31,82,165,0.99)',
                            borderWidth: 0,
                            data: [ stnk, sim, kk, atm, tab, paspor, ser, nikah, dll],
                        }]
                    },
                    // Configuration options go here
                    options: {
                        scaleShowVerticalLines: false,
                        responsive: true,
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                categoryPercentage: 0.45,
                                barPercentage: 0.70,
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Month'
                                },
                                gridLines: false,
                                ticks: {
                                    display: true,
                                    beginAtZero: true,
                                    fontSize: 13,
                                    padding: 10
                                }
                            }],
                            yAxes: [{
                                categoryPercentage: 0.35,
                                barPercentage: 0.70,
                                display: true,
                                scaleLabel: {
                                    display: false,
                                    labelString: 'Value'
                                },
                                gridLines: {
                                    drawBorder: false,
                                    offsetGridLines: false,
                                    drawTicks: false,
                                    borderDash: [3, 4],
                                    zeroLineWidth: 1,
                                    zeroLineBorderDash: [3, 4]
                                },
                                ticks: {
                                    max: 20,
                                    stepSize: 4,
                                    display: true,
                                    beginAtZero: true,
                                    fontSize: 13,
                                    padding: 10
                                }
                            }]
                        }
                    }
                });
            });

        });


    </script>

@endsection

