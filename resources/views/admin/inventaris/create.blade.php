@extends('layouts.master')

@section('header','Tambah Inventaris')

@section('content')
	Tambah Inventaris
	<br>
	<div class="col-12 col-md-6 col-lg-6">
		<form action="{{ route('inventori.store') }}" method="POST" id="form-createInven">
    {{ csrf_field() }}
		<div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama">
        </div>

        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" min="0" class="form-control" name="jumlah" id="jmlBarang">
        </div>

        <div class="form-group">
          <label>Kondisi</label>
          <br>
          <input type="number" placeholder="Jumlah Inven Bagus" id="bagus" min="0" class="form-control" name="bagus">
          <br>
          <input type="number" placeholder="Jumlah Inven Rusak" id="rusak" min="0" class="form-control" name="rusak">
        </div>

        <div class="form-group">
          <label>Tanggal Register</label>
          <input type="text" class="form-control datepicker" name="tanggal_register">
        </div>

         <div class="form-group">
          <label>Jenis</label>
          <select class="form-control" name="id_jenis">
          @foreach($jenis as $dataJenis)
            <option value="{{$dataJenis->id_jenis}}">{{ $dataJenis->nama_jenis }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Ruang</label>
          <select class="form-control" name="id_ruang">
          @foreach($ruang as $dataRuang)
            <option value="{{$dataRuang->id_ruang}}">{{ $dataRuang->nama_ruang }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Petugas</label>
          <select class="form-control" name="id_petugas">
          @foreach($petugas as $dataPetugas)
            <option value="{{ $dataPetugas->id_petugas }}">{{ $dataPetugas['nama_petugas'] }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Keterangan</label>
          <input type="text" class="form-control" name="keterangan">
        </div>
  </form>	
  <button onclick="checkKondisi()" class="btn btn-primary">Tambah Inventaris</button>
	</div>
	
	
@endsection