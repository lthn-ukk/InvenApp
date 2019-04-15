<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use Response;
class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::paginate(10);
        return view('admin.jenis.jenis',['jenis'=>$jenis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis = new Jenis;
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->kode_jenis = $request->kode_jenis;
        $jenis->keterangan = $request->keterangan_jenis;
        $jenis->save();
        return redirect('jenis')->with('pesan','Data Berhasil DiTambahkan');
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
        $data = Jenis::find($id);

        return view('admin.jenis.edit',['jenis'=>$data]);
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
        $jenis = Jenis::find($id);
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->kode_jenis = $request->kode_jenis;
        $jenis->keterangan = $request->keterangan_jenis;
        $jenis->save();

        return redirect('jenis')->with('pesan','Data Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = Jenis::find($id)->delete();

        return redirect('jenis')->with('pesan','Data Berhasil DiHapus');
    }
}
