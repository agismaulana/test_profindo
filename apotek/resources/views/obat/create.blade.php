@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Tambah Data Obat</h1>

		<form action="{{ route('obat.store') }}" method="POST" accept-charset="utf-8">
			@csrf
			<div class="card col-lg-4">
				<div class="card-body">
					<div class="form-group">
						<label for="namaObat">Nama Obat</label>
						<input type="text" name="namaObat" class="form-control" id="namaObat">
						@error('namaObat')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="hargaObat">Harga Obat</label>
						<input type="text" name="hargaObat" class="form-control" id="hargaObat">
						@error('hargaObat')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="sisaObat">Sisa Obat</label>
						<input type="numeric" min="0" name="sisaObat" class="form-control" id="sisaObat">
						@error('sisaObat')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="tanggalKadaluarsa">Tanggal Kadaluarsa</label>
						<input type="date" name="tanggalKadaluarsa" class="form-control" id="tanggalKadaluarsa">
						@error('tanggalKadaluarsa')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
@endsection