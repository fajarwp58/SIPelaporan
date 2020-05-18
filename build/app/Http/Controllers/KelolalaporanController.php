<?php

namespace App\Http\Controllers;

use App\DetailLaporan;
use App\DocPendukung;
use App\Jenis;
use App\Laporan;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Pelapor;
use Illuminate\Support\Facades\DB;
use App\Pangkat;
use DateTime;
use Yajra\DataTables\DataTables;
use Excel;
use App\Exports\LaporanExport;
class KelolalaporanController extends Controller
{
    public function addlaporan($id)
    {
        $AWAL = 'LP';
        // karna array dimulai dari 0 maka kita tambah di awal data kosong
        // bisa juga mulai dari "1"=>"I"
        $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $noUrutAkhir = \App\Laporan::max('id');
        $no = 1;
        if($noUrutAkhir) {
            $surat =  $AWAL .'/' .sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        else {
            $surat = $AWAL .'/' .sprintf("%03s", $no). '/' . $bulanRomawi[date('n')] .'/' . date('Y');
        }
        $pelapor = Pelapor::where('pelapor_nik',$id)->first();
        return view('addlaporan',['pelapor'=>$pelapor, 'surat'=>$surat]);
    }

    public function listjenis(){
        $jenis  = Jenis::all();
            return json_encode($jenis);
    }

    public function update(Request $request,$id){

        $laporan = Laporan::where('id',$id)->first();
        $laporan->laporan_no = $request->laporan_no;
        $laporan->laporan_lokasi = $request->laporan_lokasi;
        $laporan->laporan_keterangan = $request->laporan_keterangan;
        $laporan->update();
    }

    public function create(Request $request){

        $waktu = Carbon::now();
//        $originalDate = $request->laporan_tglhilang;

        $laporan = new Laporan;
        $laporan->pelapor_nik = $request->pelapor_nik;
        $laporan->laporan_no = $request->laporan_no;
        $laporan->laporan_tgllapor = $waktu->toDateTimeString();
        $laporan->user_nrp = $request->user_nrp;
        $laporan->pelapor_nik = $request->pelapor_nik;
        $laporan->laporan_tglhilang = $request->laporan_tglhilang;
        $laporan->laporan_lokasi = $request->laporan_lokasi;
        $laporan->laporan_keterangan = $request->laporan_keterangan;
        $laporan->save();

        //$input=$request->all();
        $images=array();
            if($files=$request->file('doc_pendukung_file')){
            foreach($files as $file){
                $nama_file=$file->getClientOriginalName();
                $tujuan_upload = 'DocumentLaporan';
                $file->move($tujuan_upload,$nama_file);
                $images[]=$nama_file;
            }
        }

        // for ($u = 0; $u < count($request->file('doc_pendukung_file')); $u++) {
        //     $docpendukung = new DocPendukung;
        //     $docpendukung->laporan_id = Laporan::all()->last()->id;
        //     $docpendukung->doc_pendukung_file = $images[$u];

        //     $docpendukung->save();
        DocPendukung::insert( [
            'laporan_id'  => Laporan::all()->last()->id,
            'doc_pendukung_file'=>  implode("|",$images),
            //you can put other insertion here
        ]);

       // }

        for ($i = 0; $i < count($request->jenis_id); $i++) {
            $detaillaporan = new DetailLaporan;
            $detaillaporan->laporan_id  = Laporan::all()->last()->id;
            $detaillaporan->jenis_id = $request->jenis_id[$i];
            $detaillaporan->nama_pemilik = $request->nama_pemilik[$i];
            $detaillaporan->detail_laporan_ket = $request->detail_laporan_ket[$i];

            $detaillaporan->save();
        }

        $id = $request->laporan_no;
        $select = Laporan::where('laporan_no',$id)->pluck('id');
        return $this->print($select);


    }

    public function data()
    {
        $detail_laporan = Laporan::with(['pelapor','doc_pendukung'])->get();

        return DataTables::of($detail_laporan)->toJson();
    }


    public function print($id)
    {
        $detail = DetailLaporan::with(['laporan'])->where('laporan_id',$id)->first();
        $detail2 = DetailLaporan::with(['laporan'])->where('laporan_id',$id)->get();
        $detail3 = DB::table('user')
        ->join('pangkat','user.pangkat_id','=','pangkat.pangkat_id')
        ->where('role_id','=',1)
        ->first();
        $umur = Carbon::parse($detail->laporan->pelapor->pelapor_tgl_lahir)->age;
        $tgllapor = Carbon::parse($detail->laporan->laporan_tgllapor)->format('d/m/Y');
        $daylapor = Carbon::parse($detail->laporan->laporan_tgllapor)->translatedFormat('l');
        $tglhilang = Carbon::parse($detail->laporan->laporan_tglhilang)->format('d-m-Y');
        $dayhilang = Carbon::parse($detail->laporan->laporan_tglhilang)->translatedFormat('l');

        $jamlapor = Carbon::parse($detail->laporan->laporan_tgllapor)->format('H:i');



        return view('laporan',['detail'=>$detail,
                                        'detail2'=>$detail2,
                                        'detail3'=>$detail3,
                                        'umur'=>$umur,
                                        'tgllapor'=>$tgllapor,
                                        'tglhilang'=>$tglhilang,
                                        'jamlapor'=>$jamlapor,
                                        'dayhilang'=>$dayhilang,
                                        'daylapor'=>$daylapor]);
    }


}
