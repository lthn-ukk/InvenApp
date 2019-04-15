@extends('layouts.master')

@section('header','Ubah Data Jenis')

@section('content')

<div class="row">
    <div class="col-lg-6">
    <form action="{{ route('jenis.update',$jenis->id_jenis) }}" id="ruang-form" method="POST" class="formInput">
        @csrf     
        @method('PUT')
        <div class="form-group">
            <label for="">Nama Jenis</label>
            <input type="text" name="nama_jenis" id="nama_jenis" value="{{$jenis->nama_jenis}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Kode Jenis</label>
            <input type="text" name="kode_jenis" value="{{$jenis->kode_jenis}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan_jenis" id="ket" class="form-control" value="{{$jenis->keterangan}}">
        </div>

        <button class="btn btn-primary" type="submit">Ubah</button>
        <a href="/jenis" class="btn btn-warning">Kembali</a>
    </form>
    </div>
</div>

@endsection