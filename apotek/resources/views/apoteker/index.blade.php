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
					<h3>Data Apoteker</h3>
					<a href="{{ route('apoteker.create') }}" title="create" class="btn btn-primary btn-sm">Tambah Data Apoteker</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-striped table-bordered" id="datatable">
						<thead>
							<tr>
								<th>Kode Apoteker</th>
								<th>Nama Apoteker</th>
								<th>Tanggal Lahir</th>
								<th>Aksi</th>
							</tr>
						</thead>
							@foreach($data as $apoteker)
								<tr key="{{ $apoteker->kodeApoteker }}">
									<td>{{ $apoteker->kodeApoteker }}</td>
									<td>{{ $apoteker->namaApoteker }}</td>
									<td>{{ AppHelper::date_format($apoteker->tanggalLahir) }}</td>
									<td>
										<span class="d-flex">
											<a href="{{ route('apoteker.edit', $apoteker->kodeApoteker) }}" class="btn btn-success btn-sm me-2">Edit</a>
											<form action="{{ route('apoteker.destroy', $apoteker->kodeApoteker) }}" method="post" accept-charset="utf-8">
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