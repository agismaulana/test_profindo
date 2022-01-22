@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Tambah Data Transaksi</h1>

		<form action="{{ route('transaksi.update', $data->idTransaksi) }}" method="POST" accept-charset="utf-8">
			@csrf
			@method('PUT')
			<div class="card col-lg-4">
				<div class="card-body">
					<div class="form-group">
						<label for="kodeObat">Kode Obat</label>
						<select name="kodeObat" class="form-control">
							<option> -- Pilih Kode Obat -- </option>
							@foreach($obat as $dataObat)
							<option value="{{ $dataObat->kodeObat }}">{{ $dataObat->namaObat }} ({{ $dataObat->kodeObat }})</option>
							@endforeach
						</select>
						@error('kodeObat')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					<div class="form-group">
						<label for="stokObat">Stok Obat</label>
						<input type="number" min="0" name="stokObat" class="form-control" id="stokObat" readonly>
						<span id="messageStok">
						</span>
					</div>
					<div class="form-group">
						<label for="jumlahJual">jumlah Jual</label>
						<input type="number" min="0" name="jumlahJual" class="form-control" id="jumlahJual" value="{{ $data->jumlahJual }}">
						@error('jumlahJual')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					@if(Auth::user()->apoteker_id == null)
					<div class="form-group">
						<label for="kodeApoteker">Kode Apoteker</label>
						<select name="kodeApoteker" class="form-control">
							<option> -- Pilih Kode Apoteker -- </option>
							@foreach($apoteker as $dataApoteker)
							<option value="{{ $dataApoteker->kodeApoteker }}">{{ $dataApoteker->namaApoteker }} ({{ $dataApoteker->kodeApoteker }})</option>
							@endforeach
						</select>
						@error('kodeObat')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
					@else
					<div class="form-group">
						<label for="kodeApoteker">Kode Apoteker ({{ Auth::user()->name }})</label>
						<input type="text" name="kodeApoteker" class="form-control" value="{{ Auth::user()->apoteker_id }}" readonly>
					</div>
					@endif
					<br>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>

	@push('js')
		<script>
			$(function() {
				$('select[name="kodeObat"] option[value="{{ $data->kodeObat }}"]').attr('selected', 'selected')
				$('select[name="kodeApoteker"] option[value="{{ $data->kodeApoteker }}"]').attr('selected', 'selected')
				getStok('{{$data->kodeObat}}')
			})

			$('select[name="kodeObat"]').on('change', function() {
				getStok($(this).val())
			})

			let oldStok;
			$('input[name="jumlahJual"]').bind('keyup mouseup', function() {
				if(!oldStok) {
					oldStok = $('input[name="stokObat"]').val() 
				}

				let oldVal = $(this).val()
				let stok = (parseInt(oldStok) + parseInt({{ $data->jumlahJual }})) - oldVal
				if(parseInt(oldStok) < oldVal) {
					stok = 0
					$(this).val(oldStok)
				}

				$('input[name="stokObat"]').val(stok)
			})

			function getStok(kode) {
				let url = '{{ route('transaksi.getStok', ':id') }}'
				url = url.replace(':id', kode)

				$.ajax({
					url: url,
					method: 'GET',
					dataType: 'JSON',
					success: function(response) {
						$('input[name="stokObat"]').val(response.stok.sisaObat)
					}
				})
			}
		</script>
	@endpush
@endsection