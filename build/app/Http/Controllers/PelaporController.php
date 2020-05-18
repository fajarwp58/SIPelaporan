<?php

namespace App\Http\Controllers;

use App\Pelapor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use DataTables;
class PelaporController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
        ]);
    }

    public function data()
    {
        $pelapor = Pelapor::all();
        return DataTables::of($pelapor)->toJson();
    }

    public function create(Request $request){

        $valid = Pelapor::where('pelapor_nik',$request->pelapor_nik)->count();


        if($valid != 0){

             $message = ['error' => 'Data Pelapor Telah ada,Gagal menambahkan!'];
             return response()->json($message);

        }
        else{

            $pelapor = new Pelapor;
            $pelapor->pelapor_nik = $request->pelapor_nik;
            $pelapor->pelapor_nama = $request->pelapor_nama;
            $pelapor->pelapor_tgl_lahir = $request->pelapor_tgl_lahir;
            $pelapor->pelapor_jekel = $request->pelapor_jekel;
            $pelapor->pelapor_alamat = $request->pelapor_alamat;
            $pelapor->pelapor_pekerjaan = $request->pelapor_pekerjaan;
            $pelapor->pelapor_notelp = $request->pelapor_notelp;
            $pelapor->pelapor_suku = $request->pelapor_suku;

            $pelapor->save() ;
        }
    }

    public function update(Request $request,$id){

        $pelapor = Pelapor::where('pelapor_nik',$id)->first();
        $pelapor->pelapor_nama = $request->pelapor_nama;
        $pelapor->pelapor_tgl_lahir = $request->pelapor_tgl_lahir;
        $pelapor->pelapor_jekel = $request->pelapor_jekel;
        $pelapor->pelapor_alamat = $request->pelapor_alamat;
        $pelapor->pelapor_pekerjaan = $request->pelapor_pekerjaan;
        $pelapor->pelapor_notelp = $request->pelapor_notelp;
        $pelapor->pelapor_suku = $request->pelapor_suku;
        $pelapor->update();
    }

    public function delete($id)
    {

        Pelapor::where('pelapor_nik', $id)->delete();

    }

    public function listrole(){
        $role = Role::all();
        return json_encode($role);
    }

}
