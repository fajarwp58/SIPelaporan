<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\User;
use App\Jenis;
use App\Pelapor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $now = Carbon::now()->year;

        //JUMLAH LAPORAN ALL
        $data = Laporan::all();
        $laporan = $data->count();

        //Jumlah USer
        $user = User::all()->count();

        //Jumlah pelapor
        $pelapor = Pelapor::all()->count();

        //jumlah jenis laporan
        $jenis = Jenis::all()->count();



        // JUMALH PER-BULAN
        $jan = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-01')->count();
        $feb = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-02')->count();
        $mar = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-03')->count();
        $apr = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-04')->count();
        $mei = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-05')->count();
        $jun = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-06')->count();
        $jul = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-07')->count();
        $agu = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-08')->count();
        $sep = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-09')->count();
        $okt = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-10')->count();
        $nov = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-11')->count();
        $des = $data->where('laporan_tglhilang' , 'LIKE',$now-1..'-12')->count();




        return view('home',[
            'laporan'=>$laporan ,
            'pelapor'=>$pelapor ,
            'jenis'=>$jenis ,
            'user'=>$user ,
            'now'=>$now,
            'jan'=>$jan,
            'feb'=>$feb,
            'mar'=>$mar,
            'apr'=>$apr,
            'mei'=>$mei,
            'jun'=>$jun,
            'jul'=>$jul,
            'agu'=>$agu,
            'sep'=>$sep,
            'okt'=>$okt,
            'nov'=>$nov,
            'des'=>$des

        ]);

    }
}
