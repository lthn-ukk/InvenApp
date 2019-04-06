@extends('layouts.master')

@section('header','Tambah Inventaris')

@section('content')
	Tambah Inventaris
	<br>
	<div class="col-12 col-md-6 col-lg-6">
		<form>
		<div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control">
        </div>

        <div class="form-group">
          <label>Kondisi</label>
          <input type="text" class="form-control">
        </div>

        <div class="form-group">
          <label>Jumlah</label>
          <input type="number" min="0" class="form-control">
        </div>

        <div class="form-group">
          <label>Tanggal Register</label>
          <input type="text" class="form-control datepicker">
        </div>

         <div class="form-group">
          <label>Jenis</label>
          <select class="form-control">
            <option>A</option>
            <option>B</option>
            <option>C</option>
          </select>
        </div>

        <div class="form-group">
          <label>Ruang</label>
          <select class="form-control">
            <option>A</option>
            <option>B</option>
            <option>C</option>
          </select>
        </div>

        <div class="form-group">
          <label>Petugas</label>
          <select class="form-control">
            <option>A</option>
            <option>B</option>
            <option>C</option>
          </select>
        </div>

        <a href="#" class="btn btn-primary">Tambah Inventaris</a>
	</form>	
	</div>
	
	
@endsection