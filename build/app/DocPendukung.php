<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocPendukung extends Model
{

    protected $table = 'doc_pendukung';
    protected $primaryKey = 'doc_pendukung_id';
    protected $fillable = [
        'laporan_id','doc_pendukung_file'
    ];

    public function laporan(){
        return $this->belongsTo('App\Laporan','id','laporan_id');
    }

}
