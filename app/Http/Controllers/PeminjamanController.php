<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\Petugas;
use App\Peminjaman;
use App\DetailPinjam;
use App\Kondisi;
use Carbon\Carbon;
class PeminjamanController extends Controller
{
    public function index(){
        $data_peminjaman = Peminjaman::all();
        foreach($data_peminjaman as $peminjaman) {
            $peminjaman->jumlah_pinjam = DetailPinjam::where('id_peminjaman', $peminjaman->id_peminjaman)->sum('jumlah');
            $data_peminjam = Petugas::find($peminjaman->id_petugas);
            $peminjaman->id_petugas = $data_peminjam->nama_petugas;
            $peminjaman->tanggal_pinjam = Carbon::parse($peminjaman->tanggal_pinjam)->format('d F Y');
        }
        
        return view('admin.peminjaman.index', compact(['data_peminjaman']));
    }

    public function create(){
        $inven = Inventaris::all();
        $petugas = Petugas::all();
        foreach($inven as $barang) {
            $kondisi = Kondisi::where('id_inventaris', $barang->id_inventaris)->first();
            $barang->bagus = $kondisi->bagus;
        }
        $first_data = Kondisi::orderBy('id_inventaris', 'asc')->first();
        $first_total = $first_data->bagus;
        $inventaris_total = Inventaris::count();
        return view('admin.peminjaman.create', compact(['petugas', 'inven', 'inventaris_total', 'first_total']));
    }

    public function addnew(Request $request)
    {
        $today = new Carbon();
        $year = $today->format('Y');
        $today = $today->format('Y-m-d');
        foreach($request->barang as $key => $inventaris) {
            $id = explode('|', $inventaris);
            $data[] = array(
                "ID Barang" => $id[0],
                "Jumlah" => $request->jumlah[$key],
            );
        }
        
        $data_peminjaman = new Peminjaman();
        $data_peminjaman->tanggal_pinjam = $today;
        $data_peminjaman->status_peminjaman = "Belum dikembalikan";
        $data_peminjaman->id_petugas = $request->id_petugas;
        $data_peminjaman->save();
        $data_peminjaman = Peminjaman::first();
        
        foreach($data as $inventarisnya) {
            $data_detail = new DetailPinjam();
            $data_detail->id_inventaris = $inventarisnya["ID Barang"];
            $data_detail->jumlah = $inventarisnya["Jumlah"];
            $data_detail->id_peminjaman = $data_peminjaman->id_peminjaman;
            $data_detail->save();
            $data_inventaris = Inventaris::find($inventarisnya["ID Barang"]);
            $new_total = $data_inventaris->jumlah - $inventarisnya["Jumlah"];
            $data_inventaris->jumlah = $new_total;
            $data_inventaris->save();
            $data_kondisi = Kondisi::where('id_inventaris', $inventarisnya["ID Barang"])->first();
            if($inventarisnya["Jumlah"] > $data_kondisi->bagus) {
                $sisa = $inventarisnya["Jumlah"] - $data_kondisi->bagus;
                $data_kondisi->bagus = "0";
                if($sisa > $data_kondisi->rusak) {
                    $sisa2 = $sisa - $data_kondisi->rusak;
                    $data_kondisi->rusak = "0";
                } else {
                    $sisa2 = $data_kondisi->rusak - $sisa;
                    $data_kondisi->rusak = $sisa2;
                }
            } else {
                $sisa = $data_kondisi->bagus - $inventarisnya["Jumlah"];
                $data_kondisi->bagus = $sisa;
            }
            $data_kondisi->save();
        }
        $data_peminjaman->save();

        return redirect()->route('peminjaman');
    }

    public function updateStatus(Request $request,$id) {
        $today = new Carbon();
        $today = $today->format('Y-m-d');
        $data_peminjaman = Peminjaman::find($id);
        $detail_peminjaman = DetailPinjam::where('id_peminjaman',$id)->get();
        if($request->status == "BK") {
            $data_peminjaman->status_peminjaman = 'Sudah dikembalikan';
            foreach($detail_peminjaman as $detail) {
                $barang = Inventaris::find($detail->id_inventaris);
                $kondisi = Kondisi::where('id_inventaris',$detail->id_inventaris)->first();
                $barang->jumlah = $barang->jumlah + $detail->jumlah;
                $kondisi->bagus = $kondisi->bagus + $detail->jumlah;
                $barang->save();
                $kondisi->save();
            }
            $data_peminjaman->tanggal_kembali = $today;
        } else {
            $data_peminjaman->status_peminjaman = 'Belum dikembalikan';
            foreach($detail_peminjaman as $detail) {
                $barang = Inventaris::find($detail->id_inventaris);
                $kondisi = Kondisi::where('id_inventaris',$detail->id_inventaris)->first();
                $barang->jumlah = $barang->jumlah - $detail->jumlah;
                $kondisi->bagus = $kondisi->bagus - $detail->jumlah;
                $barang->save();
                $kondisi->save();
            }
            $data_peminjaman->tanggal_kembali = NULL;
        }
        if($data_peminjaman->save()) {
            return redirect('peminjaman')->with('pesan','Status Berhasil Di Ubah');
        } else {
            dd('error');
        }
        exit;
    }
}
