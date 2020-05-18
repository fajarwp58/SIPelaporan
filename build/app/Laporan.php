<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'laporan_no', 'pelapor_nik' , 'laporan_tgllapor' ,'laporan_tglhilang',
        'laporan_lokasi' , 'laporan_keterangan'
    ];
    public $incrementing = false;

    public function pelapor() {
        return $this->belongsTo('App\Pelapor', 'pelapor_nik', 'pelapor_nik');
    }

    public function doc_pendukung() {
        return $this->belongsTo('App\DocPendukung', 'id', 'laporan_id');
    }

    public function jenis()
    {
        return $this->belongsToMany('App\Jenis','detail_laporan','laporan_id','jenis_id');
    }

    public function user()
    {
        return $this->belongsToMany('App\User','laporan_user','laporan_id','user_nrp');
    }

}
