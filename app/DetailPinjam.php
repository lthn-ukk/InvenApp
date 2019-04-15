<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    protected $primaryKey = 'id_detail_pinjam';
    protected $table = 'detail_pinjam';
    public $timestamps = false;
}
