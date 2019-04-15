@extends('layouts.master')

@section('header','Ubah Data Ruangan')

@section('content')

<div class="row">
    <div class="col-lg-6">
    <form action="{{ route('ruang.update',$ruang->id_ruang) }}" id="ruang-form" method="POST" class="formInput">
        @csrf     
        @method('PUT')
        <div class="form-group">
            <label for="">Nama Ruang</label>
            <input type="text" name="nama_ruang" id="nama_ruang" value="{{$ruang->nama_ruang}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Kode Ruang</label>
            <input type="text" name="kode_ruang" id="kode_ruang" value="{{$ruang->kode_ruang}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan_ruang" id="ket" value="{{$ruang->keterangan}}" class="form-control">
        </div>

        <button class="btn btn-primary" type="submit">Ubah</button>
        <a href="/ruang" class="btn btn-warning">Kembali</a>
    </form>
    </div>
</div>

@endsection