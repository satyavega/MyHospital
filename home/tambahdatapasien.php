<!DOCTYPE html>
<html>

<head>
	<title>DAFTAR PASIEN</title>
    <link href="home/css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container">
	<h1>PENDAFTARAN PASIEN BARU</h1>

<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>Umur pasien</td>
			<td><input type="number" name="umur_pasien" id="umur_pasien"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><select name="jenis_kelamin">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select></td>
		</tr>
		<tr>
			<td>No Telepon</td>
			<td><input type="number" name="telp"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><textarea name="alamat"></textarea></td>
		</tr>
		<tr>
			<td>Tanggal masuk</td>
			<td><input type="date" name="tanggal_masuk"></td>
		</tr>
		<tr>
			<td>Tanggal Keluar</td>
			<td><input type="date" name="tanggal_keluar"></td>
		</tr>
		<tr>
			<td>Penyakit Pasien</td>
			<td><input type="text" name="penyakit_pasien"></td>
		</tr>
		<tr>
			<td>Pelayanan</td>
			<td><select name="pelayanan">
				<option value="rawat_inap">Rawat Inap</option>
				<option value="rawat_jalan">Rawat Jalan</option>
				<option value="igd">IGD 24 Jam</option>
				<option value="diagnosis">Diagnosis Penyakit</option>
			</select></td>
		</tr>
		<tr>
			<td>Obat Pasien</td>
			<td><input type="text" name="obat_pasien"></td>
		</tr>
		<tr>
			<td>Kamar Pasien</td>
			<td><input type="text" name="kamar_pasien"></td>
		</tr>
		<tr>
			<td>Metode Pembayaran</td>
			<td><input type="text" name="metode_pembayaran"></td>
	    </tr>
		<td><input type="submit" name="tbsimpan"></td>
	</table>
</form>
</div>
</body>
</html>

<?php
if (isset($_POST['tbsimpan'])) {
	include 'koneksi.php';
	$nama = $_POST['nama'];
	$umur_pasien = $_POST['umur_pasien'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$tanggal_masuk = $_POST['tanggal_masuk'];
	$tanggal_keluar = $_POST['tanggal_keluar'];
	$penyakit_pasien = $_POST['penyakit_pasien'];
	$pelayanan = $_POST['pelayanan'];
	$obat_pasien = $_POST['obat_pasien'];
	$kamar_pasien = $_POST['kamar_pasien'];
	$metode_pembayaran = $_POST['metode_pembayaran'];


$querysimpan = "INSERT INTO tbl_pasien (nama, umur_pasien, jenis_kelamin, telp, alamat, tanggal_masuk, tanggal_keluar, penyakit_pasien, pelayanan, obat_pasien, kamar_pasien, metode_pembayaran) VALUES ('$nama','$umur_pasien','$jenis_kelamin','$telp','$alamat','$tanggal_masuk','$tanggal_keluar','$penyakit_pasien','$pelayanan','$obat_pasien','$kamar_pasien','$metode_pembayaran');";
$simpandata = $conn->query($querysimpan);

if ($simpandata) {
	echo "<script>alert('data berhasil disimpan');window.location='createacc.php';</script>";
} else {
	echo $conn->error;
	}
}
?>