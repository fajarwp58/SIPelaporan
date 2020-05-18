<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'jenis_id';
    protected $fillable = [
        'jenis_nama',
    ];

    public function laporan()
    {
        return $this->belongsToMany('App\Laporan','detail_laporan','jenis_id','id');
    }

}
