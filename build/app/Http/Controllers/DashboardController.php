<?php

namespace App\Http\Controllers;

use App\DetailLaporan;
use App\Laporan;
use App\User;
use App\Jenis;
use App\Pelapor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $now = Carbon::now();

        //JUMLAH LAPORAN ALL
        $data = Laporan::all();
        $laporan = $data->count();

        //Jumlah laporan hari ini
        $totallaporanhariini = Laporan::whereDate('laporan_tgllapor', Carbon::today())->count();

        //Jumlah pelapor
        $pelapor = Pelapor::all()->count();

        //jumlah jenis laporan
        $jenis = Jenis::all()->count();

        //data logbook
        $tablelaporan = Laporan::whereDate('laporan_tgllapor', Carbon::today())->orderByDesc('laporan_tgllapor')->get();


        return view('home',[
            'laporan'=>$laporan ,
            'pelapor'=>$pelapor ,
            'jenis'=>$jenis ,
            'totallaporanhariini'=>$totallaporanhariini ,
            'now'=>$now,
            'tablelaporan'=>$tablelaporan
        ]);

    }
}
