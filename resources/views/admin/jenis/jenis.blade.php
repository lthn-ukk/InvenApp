@extends('layouts.master')

@section('header','Data Jenis Inventaris asd')

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
				<h4>List Jenis Inventori</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-md">
							<tbody id="jenis-table">
								<tr>
									<th>No</th>
									<th>Nama Jenis</th>
									<th>Kode Jenis</th>
									<th>Keterangan</th>
									<th>Action</th>
								</tr>
									@foreach($jenis as $dataJenis)
								<tr id="jenis_id_{{$dataJenis->id_jenis}}">
									<td>{{ $loop->iteration }}</td>
									<td>{{ $dataJenis->nama_jenis }}</td>
									<td>{{ $dataJenis->kode_jenis }}</td>
									<td>{{ $dataJenis->keterangan }}</td>
									<td>
									<a href="{{ route('jenis.edit',$dataJenis->id_jenis) }}" class="btn btn-success">Ubah</a>
									<form action="{{route('jenis.destroy',$dataJenis->id_jenis)}}" method="POST">
										@csrf
										@method('DELETE')
									  <button class="btn btn-danger" type="submit" onclick="confirm('anda yakin ingin menghapus data ini?')">Hapus</button>
									</form>
									
									</td>
								</tr>
						@endforeach
					  </tbody>
					</table>	
        </div>
        {{ $jenis->links() }}

						<div class="form-group">
								<a class="btn btn-primary" href="jenis/create">Tambah Data Jenis Inventaris</a>
						</div>
				</div>
				<div class="card-footer">
    
				</div>
			</div>
</div>
</div>

<!-- <div class="modal fade" tabindex="-1" role="dialog" id="modalExample">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="jenis-form" method="POST" class="formInput">
			@csrf
			
			<div class="form-group">
				<label for="">Nama Jenis</label>
				<input type="text" name="nama_jenis" id="nama_jenis" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Kode Jenis</label>
				<input type="text" name="kode_jenis" id="kode" readonly class="form-control">
			</div>

			<div class="form-group">
				<label for="">Keterangan</label>
				<input type="text" name="keterangan_jenis" id="ket" class="form-control">
			</div>
		
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="button">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
@endsection


