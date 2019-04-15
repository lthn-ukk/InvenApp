@extends('layouts.master')

@section('header','Tambah Data Ruangan')

@section('content')

<div class="row">
    <div class="col-lg-6">
    <form action="{{ route('ruang.store') }}" id="ruang-form" method="POST" class="formInput">
		@csrf     
        <div class="form-group">
            <label for="">Nama Ruang</label>
            <input type="text" name="nama_ruang" id="nama_ruang" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Kode Ruang</label>
            <input type="text" name="kode_ruang" id="kode_ruang" readonly class="form-control kode">
        </div>

        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan_ruang" id="ket" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Tambah</button>
        <a href="/ruang" class="btn btn-warning">Kembali</a>
    </form>
    </div>
</div>

@endsection