<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Petugas;
class PeminjamController extends Controller
{
    public function index(){
        $peminjam = Petugas::where('id_level',3)->get();
        return view('admin.peminjam.index',['peminjam'=>$peminjam]);
    }

    public function add(){
        return view('admin.peminjam.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function store(Request $request){
        $petugas = new Petugas;
        $petugas->username = $request->username;
        $petugas->password = Hash::make($request->password);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->id_level = 3;
        $petugas->save();

        return redirect('peminjam')->with('pesan','Data Berhasil ditambahkan');
    }

    public function edit($id){
        
    }
}
