@extends('layouts.master')

@section('header','Data Peminjam')

@section('content')

@if (session('pesan'))
<div class="alert alert-primary pesan">
        {{ session('pesan') }}
</div>
@endif
				
<div class="row">
	
		<div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4>List Peminjam</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-striped table-md">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Peminjam</th>
                            <th>Action</th>
                        </tr>
                        @foreach($peminjam as $dataPeminjam)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dataPeminjam->username }}</td>
                            <td>{{ $dataPeminjam->nama_petugas }}</td>
                            <td>
                                <a data-id="{{ $dataPeminjam->id_petugas }}" href="{{route('peminjam.edit',$dataPeminjam->id_petugas)}}" class="btn btn-success">Ubah</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>	
            </div>

<a href="{{route('peminjam.create')}}" class="btn btn-primary">Tambah Peminjam</a>
@endsection