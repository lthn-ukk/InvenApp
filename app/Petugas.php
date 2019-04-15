<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable 
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    protected $fillable = ['username','password','nama_petugas','id_level'];
    public $timestamps = false;
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function petugasToInven(){
        return $this->hasMany('App\Inventaris');
    }

    public function level_r(){
        return $this->belongsTo('App\Level','id_level');
    }
    
    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();
        
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
    private function getUserRole()
    {
       return $this->level_r()->getResults();
    }
    
    private function cekUserRole($role)
    {
        return (strtolower($role)==strtolower($this->have_role->nama_level)) ? true : false;
    }
}
