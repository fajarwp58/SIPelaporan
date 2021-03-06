<?php

namespace App\Http\Controllers;

use App\DetailLaporan;
use App\DocPendukung;
use App\Jenis;
use App\Laporan;
use App\User;
use Carbon\Carbon;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use App\Pelapor;
use Illuminate\Support\Facades\DB;
use App\Pangkat;
use DateTime;
use Yajra\DataTables\DataTables;
use Excel;
use App\Exports\LaporanExport;
use App\LaporanUser;

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
        $user_kepala = User::where('role_id',1)->first();
        return view('addlaporan',['pelapor'=>$pelapor, 'surat'=>$surat, 'user_kepala'=>$user_kepala]);
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

//        $validator = Validator::make($request->all(), [
//            'doc_pendukung_file ' => 'mimes:jpeg,bmp,png|size:1024',
//        ],
//        [
//            'doc_pendukung_file.size' => "ukuran file upload melewati batas maksomal  (max : 1mb) ",
//            'doc_pendukung_file.mimes' => "file yang diupload harus tipe berjenis image "
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()->withErrors($validator->errors());
//        }

            $waktu = Carbon::now();

            $laporan = new Laporan;
            $laporan->pelapor_nik = $request->pelapor_nik;
            $laporan->laporan_no = $request->laporan_no;
            $laporan->laporan_tgllapor = $waktu->toDateTimeString();
            $laporan->pelapor_nik = $request->pelapor_nik;
            $laporan->laporan_tglhilang = $request->laporan_tglhilang;
            $laporan->laporan_lokasi = $request->laporan_lokasi;
            $laporan->laporan_keterangan = $request->laporan_keterangan;
            $laporan->save();

            $laporanuser = new LaporanUser();
            $laporanuser->laporan_id = Laporan::all()->last()->id;
            $laporanuser->user_input_nrp = $request->user_nrp;
            $laporanuser->user_kepala_nrp = $request->user_kepala;
            $laporanuser->save();

            //$input=$request->all();
            $images = array();
            if ($files = $request->file('doc_pendukung_file')) {
                foreach ($files as $file) {
                    $nama_file = $file->getClientOriginalName();
                    $tujuan_upload = 'DocumentLaporan';
                    $file->move($tujuan_upload, $nama_file);
                    $images[] = $nama_file;
                }
            }

            DocPendukung::insert([
                'laporan_id' => Laporan::all()->last()->id,
                'doc_pendukung_file' => implode("|", $images),
            ]);


            for ($i = 0; $i < count($request->jenis_id); $i++) {
                $detaillaporan = new DetailLaporan;
                $detaillaporan->laporan_id = Laporan::all()->last()->id;
                $detaillaporan->jenis_id = $request->jenis_id[$i];
                $detaillaporan->nama_pemilik = $request->nama_pemilik[$i];
                $detaillaporan->detail_laporan_ket = $request->detail_laporan_ket[$i];

                $detaillaporan->save();
            }

            $id = $request->laporan_no;
            $select = Laporan::where('laporan_no', $id)->pluck('id');
            return $this->print($select);

    }

    public function data()
    {
        $detail_laporan = DB::table('laporan_user')
        ->join('user','laporan_user.user_input_nrp','=','user.user_nrp')
        ->join('laporan','laporan_user.laporan_id','=','laporan.id')
        ->join('pelapor','laporan.pelapor_nik','=','pelapor.pelapor_nik')
        ->join('doc_pendukung','laporan.id','=','doc_pendukung.laporan_id')
        ->get();
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
