<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{

    protected $primaryKey = 'id_ruang';
    protected $table = 'ruang';
    protected $fillable = ['nama_ruang','kode_ruang','keterangan'];
    public $timestamps = false;

    public function ruangToInven(){
        return $this->hasMany('App\Inventaris');
    }
}
