<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanUser extends Model
{
    protected $table = 'laporan_user';
    protected $fillable = [
        'laporan_id', 'user_input_nrp', 'user_kepala_nrp',
    ];

    public $timestamps = false;

    public function laporan() {
        return $this->belongsTo('App\Laporan', 'laporan_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
