@extends('layouts.app')

@push('css')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endpush
@section('content')
	<div class="container">
		@include('layouts.messages')
		<div class="card">
			<div class="card-header">
				<div class="d-flex justify-content-between align-items-center">
					<h3>Data Obat</h3>
					<a href="{{ route('obat.create') }}" title="create" class="btn btn-primary btn-sm">Tambah Data Obat</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-striped table-bordered" id="datatable">
						<thead>
							<tr>
								<th>Kode Obat</th>
								<th>Nama Obat</th>
								<th>harga Obat</th>
								<th>Sisa Obat</th>
								<th>Tanggal Kadaluarsa</th>
								<th>Aksi</th>
							</tr>
						</thead>
							@foreach($data as $obat)
								<tr key="{{ $obat->kodeObat }}">
									<td>{{ $obat->kodeObat }}</td>
									<td>{{ $obat->namaObat }}</td>
									<td>{{ AppHelper::number_format($obat->hargaObat) }}</td>
									<td>{{ $obat->sisaObat }}</td>
									<td>{{ AppHelper::date_format($obat->tanggalKadaluarsa) }}</td>
									<td>
										<span class="d-flex">
											<a href="{{ route('obat.edit', $obat->kodeObat) }}" class="btn btn-success btn-sm me-2">Edit</a>
											<form action="{{ route('obat.destroy', $obat->kodeObat) }}" method="post" accept-charset="utf-8">
												@csrf
												@method('DELETE')
												<button class="btn btn-danger btn-sm">Delete</button>
											</form>
										</span>
									</td>
								</tr>
							@endforeach
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@push('js')
		<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
		<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
		<script>
			$(function() {
				let table = $('#datatable').DataTable({
				    responsive: true,
				    processing: true,
				    ordering: false,
				});
			})
		</script>
	@endpush
@endsection