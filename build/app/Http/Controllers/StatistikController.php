<?php

namespace App\Http\Controllers;

use App\DetailLaporan;
use App\Jenis;
use App\Laporan;
use App\Pelapor;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class StatistikController extends Controller
{

    public function index(){
        $now = Carbon::now()->year;
        return view('statistik',['now'=>$now]);
    }


// DATA LAPORAN KEHILANGAN BERDASARKAN WAKTU
    public function allMonth(){
        $now = Carbon::now()->year;
        $month_array = array();
        $laporan = Laporan::whereYear('laporan_tglhilang',$now)->orderBY('laporan_tglhilang','ASC')->pluck('laporan_tglhilang');
        $laporan = json_decode($laporan);

        if(! empty($laporan)){
            foreach($laporan as $unformated_date){
                $date = new DateTime($unformated_date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
    }

    function getmMonthlyPostCount($month){
        $monthly_post_count = Laporan::whereMonth('laporan_tglhilang',$month)->get()->count();
        return $monthly_post_count;
    }

    function getMonthlyPostData(){
        $monthly_post_count_array = array();
        $month_array = $this->allMonth();
        $month_name_array = array();
        if(! empty($month_array)){
            foreach ($month_array as $month_no =>$month_name){
                $monthly_post_count = $this->getmMonthlyPostCount($month_no);
                array_push($monthly_post_count_array,$monthly_post_count);
                array_push($month_name_array,$month_name);
            }
        }

        $monthly_post_data_array = array(
          'month' => $month_name_array,
          'jumlah' => $monthly_post_count_array,
        );
        return $monthly_post_data_array;

    }



    // DATA LAPORAN BERDASARKAN JENIS

    public function alljenis(){
        $now = Carbon::now()->year;
        $stnk = DetailLaporan::where('jenis_id', 1)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();
        $sim = DetailLaporan::where('jenis_id', 2)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();
        $kk = DetailLaporan::where('jenis_id', 3)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();
        $atm = DetailLaporan::where('jenis_id', 4)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();
        $tab = DetailLaporan::where('jenis_id', 5)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();
        $paspor = DetailLaporan::where('jenis_id', 6)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();
        $ser = DetailLaporan::where('jenis_id', 7)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();
        $nikah = DetailLaporan::where('jenis_id', 8)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();
        $dll = DetailLaporan::where('jenis_id', 9)->whereYear('created_at',$now)->orderBY('created_at','ASC')->count();

        $jumlah_jenis = array(
            'stnk'=>$stnk,
            'sim'=>$sim,
            'kk'=>$kk,
            'atm'=>$atm,
            'tab'=>$tab,
            'paspor'=>$paspor,
            'ser'=>$ser,
            'nikah'=>$nikah,
            'dll'=>$dll,
        );
        return $jumlah_jenis;

    }

//    public function alljenis(){
//        $now = Carbon::now()->year;
//        $jenis_array = array();
//        $jenis = DetailLaporan::whereYear('created_at',$now)
//                                ->orderBY('created_at','ASC')
//                                ->get();
//        if(! empty($jenis)){
//            foreach($jenis as $datajenis){
//
//                $jenis_id = $datajenis->jenis_id;
//                $jenis_name = $datajenis->jenis->jenis_nama;
//                $jenis_array[$jenis_id] = $jenis_name;
//            }
//        }
//        return $jenis_array;
//    }
//
//    function totalDataJenis($jenis_id){
//        $total_data_jenis = DetailLaporan::where('jenis_id',$jenis_id)->get()->count();
//        return $total_data_jenis;
//
//    }
//
//    function PostDataJenis(){
//        $post_data_jenis_array = array();
//        $jenis_array = $this->alljenis();
//        $jenis_nama_array = array();
//        if(! empty($jenis_array)){
//            foreach ($jenis_array as $jenis_id =>$jenis_name){
//                $total_data_jenis = $this->totalDataJenis($jenis_id);
//                array_push($post_data_jenis_array,$total_data_jenis);
//                array_push($jenis_nama_array,$jenis_name);
//            }
//        }
//
//        $post_data_jenis_array = array(
//            'jenis' => $jenis_nama_array,
//            'jumlah' => $total_data_jenis,
//        );
//        return $post_data_jenis_array;
//
//    }


}
