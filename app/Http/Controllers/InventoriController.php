<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruang;
Use App\Petugas;
use App\Inventaris;
use App\Jenis;
use App\Kondisi;

class InventoriController extends Controller
{
     public function __construct()
     {
       $this->middleware('roles');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inven = Inventaris::with('kondisi_r')->paginate(10);
        return view('admin.inventaris.index',['inven'=>$inven]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruang = Ruang::all();
        $jenis = Jenis::all();
        $petugas = Petugas::where('id_level',2)->get();
        return view('admin.inventaris.create',['ruang'=>$ruang,'jenis'=>$jenis,'petugas'=>$petugas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inven = new Inventaris;
        $inven->nama = $request->nama;
        $inven->keterangan = $request->keterangan;
        $inven->jumlah = $request->jumlah;
        $inven->tanggal_register = $request->tanggal_register;
        $inven->id_jenis = $request->id_jenis;
        $inven->id_ruang = $request->id_ruang;
        $inven->id_petugas = $request->id_petugas;
        $inven->save();

        $kondisi = new Kondisi;
        $kondisi->id_inventaris = $inven->id_inventaris;
        $kondisi->bagus = $request->bagus;
        $kondisi->rusak = $request->rusak;
        $kondisi->save();

        return redirect('inventori')->with('pesan','Data Berhasil Di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inven = Inventaris::find($id);
        $ruang = Ruang::all();
        $jenis = Jenis::all();
        $petugas = Petugas::all();
        return view('admin.inventaris.edit',['inven'=>$inven,'ruang'=>$ruang,'jenis'=>$jenis,'petugas'=>$petugas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inven = Inventaris::find($id);
        $inven->nama = $request->nama;
        $inven->keterangan = $request->keterangan;
        $inven->jumlah = $request->jumlah;
        $inven->tanggal_register = $request->tanggal_register;
        $inven->id_jenis = $request->id_jenis;
        $inven->id_ruang = $request->id_ruang;
        $inven->id_petugas = $request->id_petugas;
        $inven->save();
        

        return redirect('inventori')->with('pesan','Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
