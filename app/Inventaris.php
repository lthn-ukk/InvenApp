<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'id_inventaris';
    protected $fillable = ['nama','kondisi','keterangan','jumlah','tanggal_register','id_jenis','id_ruang','id_petugas'];
    public $timestamps = false;
    
    public function petugas_r(){
        return $this->belongsTo('App\Petugas','id_petugas');
    }

    public function jenis_r(){
        return $this->belongsTo('App\Jenis','id_jenis');
    }

    public function ruang_r(){
        return $this->belongsTo('App\Ruang','id_ruang');
    }

    public function kondisi_r(){
        return $this->hasMany('App\Kondisi','id_inventaris','id_inventaris');
    }
}
