<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailLaporan extends Model
{
    protected $table = 'detail_laporan';
    protected $primaryKey = 'detail_laporan_id';
    protected $fillable = [
        'laporan_id' , 'jenis_id' , 'nama_pemilik','detail_laporan_ket'
    ];


    public function laporan() {
        return $this->belongsTo('App\Laporan', 'laporan_id', 'id');
    }

    public function jenis(){
        return $this->belongsTo('App\Jenis');
    }



}
