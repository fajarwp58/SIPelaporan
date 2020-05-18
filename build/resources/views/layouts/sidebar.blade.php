@section('sidebar')


<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">

            <div class="m-t-20 text-center">
                <div class="avatar avatar-image" style="height: 100px; width: 100px;">
                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                </div>
                <h4 class="m-t-30"> {{Auth::user()->user_nama}}  </h4>
                <p>{{Auth::user()->user_nrp}}</p>
            </div>


            @if(Auth::user()->role_id == 1)
                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('home') }}">
                                    <span class="icon-holder">
                                        <i class="fas fa-home"></i>
                                    </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolauser') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-user-add" ></i>
                                    </span>
                        <span class="title">Kelola User</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolapelapor') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-team"></i>
                                    </span>
                        <span class="title">Data Pelapor</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolajenis') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-sort-ascending"></i>
                                    </span>
                        <span class="title">Kelola Jenis Kehilangan</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('statistik') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-rise"></i>
                                    </span>
                        <span class="title">Statistik</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolalaporan') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-download"></i>
                                </span>
                        <span class="title">Kelola Laporan</span>
                    </a>
                </li>

                {{-- <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('downloadlaporan') }}">
                                <span class="icon-holder">
                                   <i class="anticon anticon-export"></i>
                                </span>
                        <span class="title">Export Laporan</span>
                    </a>
                </li> --}}



           @elseif(Auth::user()->role_id == 2)
                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('home') }}">
                                    <span class="icon-holder">
                                        <i class="fas fa-home"></i>
                                    </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolapelapor') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team"></i>
                                </span>
                        <span class="title">Data Pelapor</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolajenis') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-sort-ascending"></i>
                                    </span>
                        <span class="title">Kelola Jenis Kehilangan</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolalaporan') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-download"></i>
                                </span>
                        <span class="title">Kelola Laporan</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('statistik') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-rise"></i>
                                    </span>
                        <span class="title">Statistik</span>
                    </a>
                </li>

           @else
                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('home') }}">
                                    <span class="icon-holder">
                                        <i class="fas fa-home"></i>
                                    </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolalaporan') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-download"></i>
                                </span>
                        <span class="title">Laporan Kehilangan</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolajenis') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-sort-ascending"></i>
                                    </span>
                        <span class="title">Jenis Kehilangan</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('kelolapelapor') }}">
                                <span class="icon-holder">
                                    <i class="anticon anticon-team"></i>
                                </span>
                        <span class="title">Data Pelapor</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('downloadlaporan') }}">
                                <span class="icon-holder">
                                   <i class="anticon anticon-export"></i>
                                </span>
                        <span class="title">Export Laporan</span>
                    </a>
                </li>

                <li class="nav-item dropdown open">
                    <a class="dropdown-toggle" href="{{ url('statistik') }}">
                                    <span class="icon-holder">
                                        <i class="anticon anticon-rise"></i>
                                    </span>
                        <span class="title">Statistik</span>
                    </a>
                </li>
           @endif

        </ul>
    </div>
</div>
@endsection
