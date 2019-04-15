<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Kondisi extends Model
{
    protected $primaryKey = 'id_kondisi';
    protected $table = 'kondisi';
    public $timestamps = false;

    public function r_inven(){
        return $this->belongsTo('App\Inventaris','id_inventaris');
    }
}
