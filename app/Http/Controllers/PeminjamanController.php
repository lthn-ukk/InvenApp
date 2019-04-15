<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\Petugas;
use App\Peminjaman;
use App\DetailPinjam;
class PeminjamanController extends Controller
{
    public function index(){
        return view('admin.peminjaman.index');
    }

    public function create(){
        $inven = Inventaris::all();
        $petugas = Petugas::all();
        
        
        $jmlInven = Inventaris::count();
        return view('admin.peminjaman.create',compact(['inven','petugas','jmlInven']));
    }
}
