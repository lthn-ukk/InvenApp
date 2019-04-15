<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruang;
use Response;
class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruang = Ruang::paginate(10);
        return view('admin.ruang.ruang',['ruangan'=>$ruang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ruang = new Ruang;
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->kode_ruang = $request->kode_ruang;
        $ruang->keterangan = $request->keterangan_ruang;
        $ruang->save();
        return redirect('ruang')->with('pesan','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruang = Ruang::find($id);
        return view('admin.ruang.edit',['ruang'=>$ruang]);
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
        $ruang = Ruang::find($id);
        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->kode_ruang = $request->kode_ruang;
        $ruang->keterangan = $request->keterangan_ruang;
        $ruang->save();
        return redirect('ruang')->with('pesan','Data Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruang = Ruang::find($id)->delete();
        
        return redirect('ruang')->with('pesan','Data Berhasil Di Hapus');
    }
}
