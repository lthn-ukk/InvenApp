@extends('layouts.master')

@section('header','Tambah Data Peminjamannnnn')

@section('content')

	<div class="col-12 col-md-6 col-lg-6">
		<form action="{{ route('inventori.store') }}" method="POST">
    {{ csrf_field() }}
    
    <div class="form-group">
          <label>Nama Peminjaman</label>
          <select class="form-control" name="id_petugas">
          @foreach($petugas as $dataPetugas)
            <option value="{{ $dataPetugas->id_petugas }}">{{ $dataPetugas['nama_petugas'] }}</option>
            @endforeach
          </select>
        </div>

		<div class="form-group">
          <label>Inventaris</label>
          <select class="form-control" name="id_inventaris">
          @foreach($inven as $dataInven)
            <option value="{{$dataInven->id_inventaris}}">{{ $dataInven->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
            <label for="">Jumlah (max )</label>
            <input type="number" class="form-control" name="jumlah">
        </div>

        <button type="submit" class="btn btn-primary">Tambah Inventaris</button>
	</form>	
	</div>

@endsection