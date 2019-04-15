<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $primaryKey = 'id_peminjaman';
    protected $table = 'peminjaman';
}
