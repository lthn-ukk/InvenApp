<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table='peminjam';
    protected $primaryKey = 'id_peminjam';
    public $timestamps = false;
}
