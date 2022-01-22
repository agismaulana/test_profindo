<?php 

$conn = mysqli_connect('localhost', 'root', '', 'apotek');

$obatTerlaris = mysqli_query($conn, "select a.kodeObat, b.namaObat, count(a.kodeObat) totalTransaksi from transaksi_obat_keluar a join obat b on b.kodeObat = a.kodeObat group by kodeObat order by totalTransaksi DESC");

$transaksiIndah = mysqli_query($conn, "select a.namaApoteker, b.* from apoteker a join transaksi_obat_keluar b on a.kodeApoteker = b.kodeApoteker where a.kodeApoteker = 'AP001'");

$transaksiBulanSeptember = mysqli_query($conn, "select * from transaksi_obat_keluar where month(tanggalBeli) = 9");

$sisaObat = mysqli_query($conn, "select a.kodeObat, a.namaObat, a.sisaObat from obat a");

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Testing Soal 1 - 4</title>
	</head>
	<body>
		<h3>Program Deret Angka Bilangan Ganjil</h3>
		<hr>
		<h3 id="deret"></h3>
		<hr>
		<h3>Program Grading Nilai</h3>
		<hr>
		<input type="number" min="0" max="100" name="nilai" id="nilai">
		<button type="button" id="btn-check">Check</button>
		<h3 id="grade"></h3>
		<hr>
		<h3>program Segitiga Pascal</h3>
		<hr>
		<h3 id="pascal"></h3>
		<hr>
		<h3>Obat Yang Paling Laris Di Beli</h3>
		<table border="1" cellpadding="5">
			<thead>
				<tr>
					<th>Kode Obat</th>
					<th>Nama Obat</th>
					<th>Total Transaksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($obatTerlaris as $terlaris) : ?>
					<tr>
						<td><?= $terlaris['kodeObat'];?></td>
						<td><?= $terlaris['namaObat'];?></td>
						<td><?= $terlaris['totalTransaksi'];?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<hr>
		<h3>Transaksi Yang Dilakukan Apoteker Indah</h3>
		<table border="1" cellpadding="5">
			<thead>
				<tr>
					<th>Nama Apoteker</th>
					<th>Id Transaksi</th>
					<th>Kode Obat</th>
					<th>Jumlah Jual</th>
					<th>Kode Apoteker</th>
					<th>Tanggal Beli</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($transaksiIndah as $transaksi) : ?>
					<tr>
						<td><?= $transaksi['namaApoteker'];?></td>
						<td><?= $transaksi['idTransaksi'];?></td>
						<td><?= $transaksi['kodeObat'];?></td>
						<td><?= $transaksi['jumlahJual'];?></td>
						<td><?= $transaksi['kodeApoteker'];?></td>
						<td><?= $transaksi['tanggalBeli'];?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<hr>
		<h3>Transaksi Pada Bulan September</h3>
		<table border="1" cellpadding="5">
			<thead>
				<tr>
					<th>Id Transaksi</th>
					<th>Kode Obat</th>
					<th>Jumlah Jual</th>
					<th>Kode Apoteker</th>
					<th>Tanggal Beli</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($transaksiBulanSeptember as $september) : ?>
					<tr>
						<td><?= $september['idTransaksi'];?></td>
						<td><?= $september['kodeObat'];?></td>
						<td><?= $september['jumlahJual'];?></td>
						<td><?= $september['kodeApoteker'];?></td>
						<td><?= $september['tanggalBeli'];?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<hr>
		<h3>Menampilkan Sisa Dari Masing Masing Obat</h3>
		<table border="1" cellpadding="5">
			<thead>
				<tr>
					<th>Kode Obat</th>
					<th>Nama Obat</th>
					<th>Sisa Obat</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($sisaObat as $sisa) : ?>
					<tr>
						<td><?= $sisa['kodeObat'];?></td>
						<td><?= $sisa['namaObat'];?></td>
						<td><?= $sisa['sisaObat'];?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<hr>
		<script src="script.js"></script>
	</body>
</html>