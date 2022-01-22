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
					<h3>Data Transaksi Obat Keluar</h3>
					<a href="{{ route('transaksi.create') }}" title="create" class="btn btn-primary btn-sm">Tambah Data Transaksi</a>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive mt-2">
					<table class="table table-striped table-bordered" id="datatable">
						<thead>
							<tr>
								<th>Id Transaksi</th>
								<th>Kode Obat</th>
								<th>Jumlah Jual</th>
								<th>Kode Apoteker</th>
								<th>Tanggal Beli</th>
								<th>Aksi</th>
							</tr>
						</thead>
							@foreach($data as $transaksi)
								<tr key="{{ $transaksi->idTransaksi }}">
									<td>{{ $transaksi->idTransaksi }}</td>
									<td>{{ $transaksi->kodeObat }}</td>
									<td>{{ $transaksi->jumlahJual }}</td>
									<td>{{ $transaksi->kodeApoteker }}</td>
									<td>{{ AppHelper::date_format($transaksi->tanggalBeli) }}</td>
									<td>
										<span class="d-flex">
											<a href="{{ route('transaksi.edit', $transaksi->idTransaksi) }}" class="btn btn-success btn-sm me-2">Edit</a>
											<form action="{{ route('transaksi.destroy', $transaksi->idTransaksi) }}" method="post" accept-charset="utf-8">
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