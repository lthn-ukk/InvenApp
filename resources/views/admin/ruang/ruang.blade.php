@extends('layouts.master')

@section('header','Data Ruangan')

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
				<h4>List Ruangan</h4>
				</div>
				<div class="card-body">
				<div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody id="ruang-table">
                        <tr>
                          <th>No</th>
                          <th>Nama Ruangan</th>
                          <th>Kode Ruangan</th>
						  <th>Keterangan</th>
                          <th>Action</th>
						</tr>
						@foreach($ruangan as $dataRuangan)
                        <tr id="ruang_id_{{$dataRuangan->id_ruang}}">
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $dataRuangan->nama_ruang }}</td>
                          <td>{{ $dataRuangan->kode_ruang }}</td>
						  <td>{{ $dataRuangan->keterangan }}</td>
						  <td id="actionRuang">
								<a data-id="{{ $dataRuangan->id_ruang }}" href="{{route('ruang.edit',$dataRuangan->id_ruang)}}" class="btn btn-success">Ubah</a>
								<form action="{{route('ruang.destroy',$dataRuangan->id_ruang)}}" method="POST">
									@csrf
									@method('DELETE')
									<button data-id="{{ $dataRuangan->id_ruang }}" class="btn btn-danger" onclick="confirm('anda yakin ingin menghapus data ini?')" type="submit" >Hapus</button>
								</form>
						 </td>
						</tr>
						@endforeach
					  </tbody>
					</table>	
        </div>
        {{ $ruangan->links() }}

						<div class="form-group">
								<a class="btn btn-primary" id="tambah" href="{{route('ruang.create')}}"  value="addRuang">Tambah Data Ruangan</a>
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
        <form action="" id="ruang-form" method="POST" class="formInput">
			@csrf
			
			<div class="form-group">
				<label for="">Nama Ruang</label>
				<input type="text" name="nama_ruang" id="nama_jenis" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Kode Ruang</label>
				<input type="text" name="kode_ruang" id="kode" readonly class="form-control">
			</div>

			<div class="form-group">
				<label for="">Keterangan</label>
				<input type="text" name="keterangan_ruang" id="ket" class="form-control">
			</div>
		
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="buttonRuang" value="addRuang">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
@endsection


