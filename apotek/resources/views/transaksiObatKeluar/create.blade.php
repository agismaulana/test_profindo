@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Tambah Data Transaksi</h1>

		<form action="{{ route('transaksi.store') }}" method="POST" accept-charset="utf-8">
			@csrf
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
					<div class="form-group d-none">
						<label for="stokObat">Stok Obat</label>
						<input type="number" min="0" name="stokObat" class="form-control" id="stokObat" readonly>
						<span id="messageStok">
						</span>
					</div>
					<div class="form-group">
						<label for="jumlahJual">jumlah Jual</label>
						<input type="number" min="0" name="jumlahJual" class="form-control" id="jumlahJual" value="0" disabled>
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
			$('select[name="kodeObat"]').on('change', function() {
				let url = '{{ route('transaksi.getStok', ':id') }}'
				let kode = $(this).val()
				url = url.replace(':id', kode)

				$.ajax({
					url: url,
					method: 'GET',
					dataType: 'JSON',
					success: function(response) {
						if($('.form-group')[1].classList.contains('d-none')) {
							$('.form-group')[1].classList.remove('d-none')
							$('input[name="jumlahJual"]').removeAttr('disabled')
						}

						$('input[name="stokObat"]').val(response.stok.sisaObat)
					}
				})
			})

			let oldStok;
			$('input[name="jumlahJual"]').bind('keyup mouseup', function() {
				if(!oldStok) {
					oldStok = $('input[name="stokObat"]').val()
				}

				let oldVal = $(this).val()
				let stok = oldStok - oldVal
				if(parseInt(oldStok) < oldVal) {
					stok = 0
					$(this).val(oldStok)
				}

				$('input[name="stokObat"]').val(stok)
			})
		</script>
	@endpush
@endsection