@extends('layouts.master')

@section('header','Datas Peminjaman')

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
				<h4>List Peminjaman</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
                <table id="table-peminjaman" class="table table-striped table-md">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Peminjam</td>
                        <td>Tanggal</td>
                        <td>Jumlah Barang</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_peminjaman as $key => $peminjaman)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td style="cursor: pointer"><a style="text-decoration: none; color: black" href="{{url('admin/peminjaman/detail')}}/{{$peminjaman->id_peminjaman}}">{{$peminjaman->id_petugas}}</a></td>
                            <td>{{$peminjaman->tanggal_pinjam}}</td>
                            <td>{{$peminjaman->jumlah_pinjam}}</td>
                            @if($peminjaman->status_peminjaman == "Belum dikembalikan")
                            <td class="text-danger" style="cursor: default">
                                {{$peminjaman->status_peminjaman}}
                            </td>
                            @else
                            <td class="text-success" style="cursor: default">
                                {{$peminjaman->status_peminjaman}}
                            </td>
                            @endif
                            <form action="{{route('peminjaman.status',$peminjaman->id_peminjaman)}}" method="POST">
                            @csrf
                            @method("PUT")
                            @if($peminjaman->status_peminjaman == "Belum dikembalikan")
                            <td><button type="submit" class="btn btn-warning">Kembalikan</button></td>
                            <input type="hidden" name="status" value="BK">
                            @else
                            <td><button class="btn btn-warning" type="submit">Belum Kembali</button></td>
                            <input type="hidden" name="status" value="K">
                            @endif
                            </form>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>	
        </div>

						<div class="form-group">
                        <a class="btn btn-primary" href="{{route('createPinjam')}}">Tambah Data</a>
						</div>
				</div>
				<div class="card-footer">
    
				</div>
			</div>
</div>


@endsection