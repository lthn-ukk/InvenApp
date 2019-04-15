@extends('layouts.master')

@section('header','Data Inventaris')

@section('content')
<div class="col-lg-6 col-md-6">
		@if (session('pesan'))
		<div class="alert alert-primary pesan">
               {{ session('pesan') }}
         </div>
        @endif
</div>
	<br>	
	<div class="row">
		<div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header">
					<h4>List Data Inventaris</h4>
					
				  </div>
				  
                  <div class="card-body p-0">
				  <a href="{{ route('inventori.create') }}" class="btn btn-primary mb-3 ml-2">Tambah Inventaris</a>
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody><tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Jumlah</th>
						  <th>Tanggal Register</th>
						  <th>Kondisi</th>	
						  <th>Jenis</th>
						  <th>Ruang</th>
						  <th>Petugas</th>
						  <th>Keterangan</th>
                          <th>Action</th>
						</tr>
						@foreach($inven as $dataInven)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$dataInven->nama}}</td>
							<td>{{$dataInven->jumlah}}</td>
						  <td>{{$dataInven->tanggal_register}}</td>
						  <td>
								@foreach($dataInven->kondisi_r as $kondisi)
								<button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Bagus">
										{{$kondisi->bagus}}
									</button>
									<button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Rusak">
										{{$kondisi->rusak}}
									</button>
								@endforeach
							</td>
						  <td>{{$dataInven->jenis_r->nama_jenis}}</td>
						  <td>{{$dataInven->ruang_r->nama_ruang}}</td>
						  <td>{{$dataInven->petugas_r->nama_petugas}}</td>
						  <td>{{$dataInven->keterangan}}</td>
						  <td>
							  <a href="{{route('inventori.edit',$dataInven->id_inventaris)}}" class="btn btn-success">Ubah</a>
							  <a href="{{route('inventori.destroy',$dataInven->id_inventaris)}}" class="btn btn-danger">Hapus</a>
								<a href="{{route('kondisi.edit',$dataInven->id_inventaris)}}" class="btn btn-info">Ubah Kondisi</a>
						 </td>
						</tr>
						@endforeach
					  </tbody>
					</table>
					
                    </div>
				  </div>
				  <!-- end card-body -->

                  <div class="card-footer text-right">
				  
                    <nav class="d-inline-block">
                      {{ $inven->links() }}
					</nav>
					
				  </div>
				  <!--end card-footer -->
					
				</div>
				<!-- end card -->

			  </div>
			  <!-- end col -->
		</div>
	
@endsection