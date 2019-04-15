@extends('layouts.master')

@section('header','Edit Inventaris')

@section('content')
	<div class="col-12 col-md-6 col-lg-6">
		<form action="{{ route('inventori.update',$inven->id_inventaris) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id_inventaris" value="{{ $inven->id_inventaris }}">
		<div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" value="{{ $inven->nama }}" name="nama">
        </div>

        <div class="form-group">
          <label>Kondisi</label>
          <select name="kondisi" id="" class="form-control">
            <option {{$inven->kondisi == 'bagus' ? 'selected' : '' }} value="bagus" selected>Bagus</option>
            <option {{$inven->kondisi == 'rusak' ? 'selected' : '' }} value="rusak">Rusak</option>
          </select>
        </div>

        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" min="0" class="form-control" value="{{ $inven->jumlah }}" name="jumlah">
        </div>

        <div class="form-group">
          <label>Tanggal Register</label>
          <input type="text" class="form-control datepicker" value="{{ $inven->tanggal_register }}" name="tanggal_register">
        </div>

         <div class="form-group">
          <label>Jenis</label>
          <select class="form-control" name="id_jenis">
           @foreach($jenis as $dataJenis)
             @if($dataJenis->id_jenis == $inven->id_jenis)
             <option value="{{$dataJenis->id_jenis}}" selected>{{ $dataJenis->nama_jenis }}</option>
             @else
             <option value="{{$dataJenis->id_jenis}}" selected>{{ $dataJenis->nama_jenis }}</option>
             @endif
           @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Ruang</label>
          <select class="form-control" name="id_ruang">
          @foreach($ruang as $dataRuang)
            @if($dataRuang->id_ruang == $inven->id_ruang)
             <option value="{{$dataRuang->id_ruang}}" selected>{{ $dataRuang->nama_ruang }}</option>
             @else
             <option value="{{$dataRuang->id_ruang}}" selected>{{ $dataRuang->nama_ruang }}</option>
             @endif
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Petugas</label>
          <select class="form-control" name="id_petugas">
          @foreach($petugas as $dataPetugas)
            @if($dataPetugas->id_petugas == $inven->id_petugas)
             <option value="{{$dataPetugas->id_petugas}}" selected>{{ $dataPetugas->nama_petugas }}</option>
             @else
             <option value="{{$dataPetugas->id_petugas}}" selected>{{ $dataPetugas->nama_petugas }}</option>
             @endif
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Keterangan</label>
          <input type="text" class="form-control" value="{{ $inven->keterangan }}" name="keterangan">
        </div>

        <button type="submit" class="btn btn-primary">Ubah Inventaris</button>
	</form>	
	</div>
	
	
@endsection