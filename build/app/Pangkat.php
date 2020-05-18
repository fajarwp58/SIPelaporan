<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    protected $table = 'pangkat';
    protected $primaryKey = 'pangkat_id' ;
    protected $fillable = [
        'pangkat_name'
    ];
    public $incrementing = false;


}
