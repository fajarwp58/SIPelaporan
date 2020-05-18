<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelapor extends Model
{
    protected $table = 'pelapor';
    protected $primaryKey = 'pelapor_nik';
    protected $fillable = [
        'pelapor_nik' , 'pelapor_nama' , 'pelapor_tgl_lahir',
        'pelapor_jekel' , 'pelapor_alamat', 'pelapor_pekerjaan',
        'pelapor_notelp' , 'pelapor_suku'
    ];
    public $incrementing = false;


    public function laporan(){
        return $this->hasMany('App\Laporan','pelapor_nik','pelapor_nik');
    }

}
