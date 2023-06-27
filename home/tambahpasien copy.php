<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
                <h2>Masukkan Data Diri</h2>
                <form action="" method="post">
                <div class="sec-container">
                    <div class="input-box">
                        <span>Nama Lengkap</span>
                        <input type="text" name="nama" required>
                    </div>
                    <div class="input-box">
                        <span>Tanggal Lahir</span>
                        <input type="date" name="tanggal_lahir" required>
                    </div>
                    <div class="input-box">
                        <span>Kota Lahir</span>
                        <input type="text" name="kota_lahir" required>
                    </div>
                    <div class="input-box">
                        <span>Alamat</span>
                        <input type="text" name="alamat" required>
                    </div>
                    <div class="input-box">
                        <span>Umur Pasien</span>
                        <input type="number" name="umur_pasien" required>
                    </div>
                    <div class="input-box">
                        <span>Nomor Telp</span>
                        <input type="number" name="telp" required>
                    </div>
                    <!-- <div class="input-box">
                        <span>Jenis Kelamin</span>
                        <input type="radio" name="gender" value="Laki-laki"> Laki-laki 
                        <input type="radio" name="gender" value="Perempuan"> Perempuan
                    </div>
                    <div class="input-box">
                        <span>Pelayanan</span>
                        <input type="radio" name="pelayanan" value="Rawat Inap"> Laki-laki 
                        <input type="radio" name="pelayanan" value="Rawat Jalan"> Rawat jalan
                    </div> -->
                    <div class="input-box">
                        <span>Keluhan Penyakit</span>
                        <textarea name="penyakit_pasien" class="textarea" cols="90" rows="2" required></textarea>
                    </div>
                    </div>
                    <div class="gender">
                        <input type="radio" name="gender" class="point" id="dot-1" required>
                        <input type="radio" name="gender" class="point" id="dot-2" required>
                        <h4>Gender</h4>
                        <div class="radio">
                            <label for="dot-1">
                                <span class="dot dot-one"></span>
                                <span class="gender" value="L">Laki-laki</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot dot-sec"></span>
                                <span class="gender" value="P">Perempuan</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot dot-third"></span>
                                <span class="gender">Anime</span>
                            </label>
                        </div>
                    </div>
                    <div class="layanan">
                        <input type="radio" name="pelayanan" id="dot-3" required>
                        <input type="radio" name="pelayanan" id="dot-4" required>
                        <input type="radio" name="pelayanan" id="dot-5" required>
                        <h4>Layanan</h4>
                        <div class="radio">
                            <label for="dot-4">
                                <span class="dot dot-fourth"></span>
                                <span class="layanan" value="rawat_jalan">Rawat Jalan</span>
                            </label>
                            <label for="dot-5">
                                <span class="dot dot-five"></span>
                                <span class="layanan" value="rawat_inap">Rawat Inap</span>
                            </label>
                            <label for="for-dot-4">
                                <span class="dot dot-fourth"></span>
                                <span class="layanan" value="diagnosis">Diagnosis</span>
                            </label>
                        </div>
                    </div>
                    <div class= "input-box">
                        <input type="submit" value="Daftar" name="tbsimpan">
                    </div>
            </form>
            </div>
</body>
</html>
<?php
	if (isset($_POST['tbsimpan'])) {
		include 'koneksi.php';
		$nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
		$umur_pasien = $_POST['umur_pasien'];
		$gender = $_POST['gender'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
        $kota_lahir = $_POST['kota_lahir'];
		$penyakit_pasien = $_POST['penyakit_pasien'];
		$pelayanan = $_POST['pelayanan'];

	$querysimpan = "INSERT INTO tbl_pasien (nama, tanggal_lahir, umur_pasien, gender, telp, alamat, kota_lahir, penyakit_pasien, pelayanan) VALUES ('$nama','$tanggal_lahir', '$umur_pasien','$gender','$telp','$alamat','$kota_lahir','$penyakit_pasien','$pelayanan');";
	$simpandata = $conn->query($querysimpan);

	if ($simpandata) {
		echo "<script>alert('data berhasil disimpan');window.location='landing.php';</script>";
	} else {
		echo $conn->error ;
        echo "<script>alert('nt dek');window.location='tambahpasien.php';</script>";

		}
	}
	?>