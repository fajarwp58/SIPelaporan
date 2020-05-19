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
                            <p class="m-b-0 text-muted">Total Laporan</p>
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
                            <i class="anticon anticon-file-text"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$totallaporanhariini}}</h2>
                            <p class="m-b-0 text-muted">Laporan Hari Ini</p>
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
                            <i class="anticon anticon-team"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$pelapor}}</h2>
                            <p class="m-b-0 text-muted">Pelapor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body" align="center">
            <h4>Log Book Laporan Kehilangan : {{$now->translatedFormat('l')}}, {{$now->format('d/m/Y')}}</h4>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" style="width:10px">#</th>
                    <th scope="col">No Laporan</th>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Jenis Barang yang hilang</th>
                    <th scope="col">Jam Lapor</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tablelaporan as $data => $datalaporan)
                    <tr>
                        <td>{{$data+1}}</td>
                        <td> {{$datalaporan->laporan_no}}</td>
                        <td>{{$datalaporan->pelapor->pelapor_nama}}</td>
                        <td>
                            @foreach($datalaporan->jenis as $data2)
                              {{$data2->jenis_nama}},
                            @endforeach
                        </td>
                        <td>{{Carbon\Carbon::parse($datalaporan->laporan_tgllapor)->format('H:i')}} WIB</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>



@endsection

@section('js')
    <script src="{{ asset ('assets/vendors/chartjs/Chart.min.js')}}"></script>

@endsection
