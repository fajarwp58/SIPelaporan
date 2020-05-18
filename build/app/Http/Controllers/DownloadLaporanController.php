<?php

namespace App\Http\Controllers;

use App\DetailLaporan;
use App\Jenis;
use App\Pelapor;
use App\Laporan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use DataTables;

class DownloadLaporanController extends Controller
{


    public function view(){
        return view('downloadlaporan');
    }


    public function data(Request $request)
    {
        $mulai = $request->mulai;
        $akhir = $request->akhir;



            if(!empty($request->mulai)) {

                $detail = Laporan::with(['pelapor', 'jenis'])
                    ->whereBetween('laporan_tgllapor', [$mulai, $akhir])
                    ->get();


            }
            else{
                $detail = Laporan::with(['pelapor', 'jenis'])->get();
            }

            return DataTables::of($detail)
                ->editColumn('laporan_tglhilang', function ($detail) {
                    return $detail->laporan_tglhilang ? with(new Carbon($detail->laporan_tglhilang))->format('d-m-Y') : '';
                })
                ->editColumn('laporan_tgllapor', function ($detail) {
                    return $detail->laporan_tgllapor ? with(new Carbon($detail->laporan_tgllapor))->format('d-m-Y') : '';
                })
                ->toJson();



    }
}
