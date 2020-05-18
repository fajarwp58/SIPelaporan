@extends('layouts.main')
@extends('layouts.sidebar')

@section('content')

    <div class="card">
        <div class="card-body" align="center">
            <img src="{{ asset('assets/images/logo/kop_baru.gif') }}" alt="Logo" width="722" height="181">
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-file-protect"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$laporan}}</h2>
                            <p class="m-b-0 text-muted">Laporan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-cluster"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$jenis}}</h2>
                            <p class="m-b-0 text-muted">Jenis Laporan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            </i><i class="anticon anticon-team"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$pelapor}}</h2>
                            <p class="m-b-0 text-muted">Pelapor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-purple">
                            <i class="anticon anticon-user"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$user}}</h2>
                            <p class="m-b-0 text-muted">User</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--            <div class="col-md-12 col-lg-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                            <h5>Laporan Kehilangan Pada Tahun {{$now - 1}}</h5>--}}
{{--                            <div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="m-t-50" style="height: 330px">--}}
{{--                            <canvas class="chart" id="line-chart"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

    </div>


{{--    <div class="row">--}}

{{--            <div class="col-md-12 col-lg-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="d-flex justify-content-between align-items-center">--}}
{{--                            <h5>Jumlahb Laporan Kehilangan Berdasarkan Jenis Pada Tahun {{$now - 1}}</h5>--}}
{{--                            <div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="m-t-50" style="height: 330px">--}}
{{--                            <canvas class="chart" id="bar-chart"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--    </div>--}}


@endsection

@section('js')
    <script src="{{ asset ('assets/vendors/chartjs/Chart.min.js')}}"></script>

@endsection
