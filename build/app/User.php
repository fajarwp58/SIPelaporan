<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user';
    protected $primaryKey = 'user_nrp';
    protected $fillable = [
        'user_nrp','user_nama', 'password','role_id','pangkat_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public $incrementing = false;


    private $have_role;

    //User memiliki 1 role (berelasi)
    public function role() {
        return $this->belongsTo('App\Role', 'role_id', 'role_id');
    }

    //User memiliki 1 pangkat (berelasi)
    public function pangkat() {
        return $this->belongsTo('App\Pangkat', 'pangkat_id', 'pangkat_id');
    }

    public function laporan()
    {
        return $this->belongsToMany('App\Laporan','laporan_user','user_nrp','id');
    }


    //untuk mencek apakah user memiliki role
    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();

        if($this->have_role->role_name == ['superadmin','spkt','sabara']) {
            return true;
        }
        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->cekUserRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->cekUserRole($roles);
        }
        return false;
    }

    //untuk mengambil nilai role_id pada tabel user
    private function getUserRole()
    {
        return $this->role()->getResults();
    }

    //untuk mengembalikan nilai role_id pada tabel user
    private function cekUserRole($role)
    {
        return (strtolower($role)==strtolower($this->have_role->role_name)) ? true : false;
    }



}
