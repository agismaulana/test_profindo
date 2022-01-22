@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Edit Data Apoteker</h1>

		<form action="{{ route('apoteker.update', $data->kodeApoteker) }}" method="POST" accept-charset="utf-8">
			@csrf
			@method('PUT')
			<div class="card col-lg-4">
				<div class="card-body">
					<div class="form-group">
						<label for="namaApoteker">Nama Apoteker</label>
						<input type="text" name="namaApoteker" class="form-control" id="namaApoteker" value="{{ $data->namaApoteker }}">
						@error('namaApoteker')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="text" name="email" class="form-control" id="email" value="{{ $data->user->email }}">
						@error('email')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" id="password">
						@error('password')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="tanggalLahir">Tanggal Lahir</label>
						<input type="date" name="tanggalLahir" class="form-control" id="tanggalLahir" value="{{ $data->tanggalLahir }}">
						@error('tanggalLahir')
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