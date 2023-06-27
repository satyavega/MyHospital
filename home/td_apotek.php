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
                <h2>Masukkan Data Obat</h2>
                <form action="" method="post">
                <div class="sec-container">
                    <div class="input-box">
                        <span>Nama Obat</span>
                        <input type="text" name="nama_obat" placeholder="Masukkan Nama Obat" required>
                    </div>
                    <div class="input-box">
                        <span>kategori</span>
                        <input type="text" name="kategori" placeholder="Masukkan Katerogi Obat" required>
                    </div>
                    <div class="input-box">
                        <span>Stok</span>
                        <input type="text" name="stok" placeholder="Masukkan Stok Obat" required>
                    </div>
                    <div class="input-box">
                        <span>Harga Umum</span>
                        <input type="number" name="harga" placeholder="Masukkan Harga Obat" required>
                    </div>
                    <!-- <div class="input-box">
                        <span>Nomor Telp</span>
                        <input type="number" name="" required>
                    </div> -->
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
                    <!-- <div class="input-box">
                        <span>Alergi</span>
                        <input type="text" name="" required>
                    </div> -->
                    <div class="input-box">
                        <span>Keterangan</span>
                        <textarea name="keterangan" class="textarea" cols="90" rows="2" placeholder="Masukkan Keterangan Obat" required></textarea>
                    </div>
                    </div>
                    <!-- <div class="gender">
                        <input type="radio" name="gender" class="point" id="dot-1" required>
                        <input type="radio" name="gender" class="point" id="dot-2" required>
                        <input type="radio" name="gender" class="point" fid="dot-3" required>
                        <h4>Gender</h4>
                        <div class="radio">
                            <label for="dot-1">
                                <span class="dot dot-one"></span>
                                <span class="gender">Laki-laki</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot dot-sec"></span>
                                <span class="gender">Perempuan</span>
                            </label>
                            <label for="dot-3">
                                <span class="dot dot-third"></span>
                                <span class="gender">Anime</span>
                            </label>
                        </div>
                    </div>
                    <div class="layanan">
                        <input type="radio" name="layanan" id="dot-4" required>
                        <input type="radio" name="layanan" id="dot-5" required>
                        <input type="radio" name="layanan" id="dot-6" required>
                        <h4>Layanan</h4>
                        <div class="radio">
                            <label for="dot-4">
                                <span class="dot dot-fourth"></span>
                                <span class="layanan">Rawat Jalan</span>
                            </label>
                            <label for="dot-5">
                                <span class="dot dot-five"></span>
                                <span class="layanan">Rawat Inap</span>
                            </label>
                            <label for="dot-6">
                                <span class="dot dot-six"></span>
                                <span class="layanan">Diagnosis</span>
                            </label>
                        </div>
                    </div> -->
                    <div class= "input-box">
                        <input type="submit" value="Tambah Data" name="tbsimpan">
                     </div>
            </form>
            </div>
</body>
</html>
<?php
	if (isset($_POST['tbsimpan'])) {
		include 'koneksi.php';
		$id_pbat = $_POST['id_obat'];
        $nama_obat = $_POST['nama_obat'];
		$kategori = $_POST['kategori'];
		$stok = $_POST['stok'];
		$harga = $_POST['harga'];
		$keterangan = $_POST['keterangan'];

	$querysimpan = "INSERT INTO tbl_obat (nama_obat, kategori, stok, harga, keterangan) VALUES ('$nama_obat', '$kategori','$stok','$harga','$keterangan');";
	$simpandata = $conn->query($querysimpan);

	if ($simpandata) {
		echo "<script>alert('data berhasil disimpan');window.location='landing.php';</script>";
	} else {
		echo $conn->error ;
        echo "<script>alert('nt dek');window.location='tambahpasien.php';</script>";

		}
	}
	?>