<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $primaryKey = 'id_level';

    public function levelToPetgs(){
        return $this->belongsTo('App\Petugas');
    }
}
