<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use Yajra\DataTables\DataTables;

class KelolajenisController extends Controller
{
    public function data()
    {
        $jenis = Jenis::all();
        return DataTables::of($jenis)->toJson();
    }

    public function create(Request $request){

            $jenis = new Jenis;
            $jenis->jenis_nama = $request->jenis_nama;

         $jenis->save();
    }

    public function update(Request $request,$id){

        $jenis = Jenis::where('jenis_id',$id)->first();
        $jenis->jenis_nama = $request->jenis_nama;
        $jenis->update();
    }

     public function delete($id)
    {

      Jenis::where('jenis_id', $id)->delete();

    }
}
