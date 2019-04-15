<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['nama_jenis','kode_jenis','keterangan'];
    public $timestamps = false;

    public function jenisToInven(){
        return $this->hasMany('App\Inventaris');
    }
}
