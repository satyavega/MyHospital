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
<?php
    include 'koneksi.php';
    if (isset($_GET['id'])) {
        $getdata = $conn->query("SELECT * FROM tbl_pasien WHERE id='" . $_GET['id'] . "'");
        $row = $getdata->fetch_array();
    } else {
        // berikan nilai default untuk $row jika $_GET['id'] tidak ada
        $row = array('nama' => '', 'alamat' => '', 'tanggal_lahir' => '', 'telp' => '', 'kota_lahir' => '', 'alergi' => '', 'gender' => '', 'pelayanan' => '');
    }
?>
    <div class="container">
                <h2>Ubah Data Pasien</h2>   
                <form action="" method="post">
                <div class="sec-container">
                    <div class="input-box">
                        <span>Nama Lengkap</span>
                        <input type="text" name="nama" value="<?= $row['nama'] ?>" required >
                    </div>
                    <div class="input-box">
                        <span>Alamat</span>
                        <input type="text" name="alamat" value="<?= $row['alamat'] ?>" required>
                    </div>
                    <div class="input-box">
                        <span>Tanggal Lahir</span>
                        <input type="date" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>" required>
                    </div>
                    <div class="input-box">
                        <span>Kota Lahir</span>
                        <input type="text" name="kota_lahir" value="<?= $row['kota_lahir'] ?>" required>
                    </div>
                    <div class="input-box">
                        <span>Nomor Telp</span>
                        <input type="number" name="telp" value="<?= $row['telp'] ?>" required>
                    </div>
                    <div class="input-box">
                        <span>Alergi</span>
                        <input type="text" name="alergi" value="<?= $row['alergi'] ?>" required>
                    </div>
                    </div>
                    <div class="gender">
                        <input type="radio" name="gender" value="Laki-laki" class="point" id="dot-1" value="<?= $row['gender'] ?>" required>
                        <input type="radio" name="gender" value="Perempuan" class="point" id="dot-2" value="<?= $row['gender'] ?>" required>
                        <input type="radio" name="gender" value="Anime" class="point" id="dot-3" value="<?= $row['gender'] ?>" required>
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
                        <input type="radio" name="pelayanan" value="Rawat jalan" id="dot-4" value="<?= $row['pelayanan'] ?>" required>
                        <input type="radio" name="pelayanan" value="Rawat inap" id="dot-5" value="<?= $row['pelayanan'] ?>" required>
                        <input type="radio" name="pelayanan" value="Diagnosis" id="dot-6" value="<?= $row['pelayanan'] ?>" required>
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
                    </div>
                    <div class= "input-box">
                        <input type="submit" value="Ubah Data" name="tbubah">
                     </div>
            </form>
            </div>
</body>
</html>
<?php
	if (isset($_POST['tbubah'])) {
		include 'koneksi.php';
		$nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
		$alergi = $_POST['alergi'];
		$gender = $_POST['gender'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
        $kota_lahir = $_POST['kota_lahir'];
		$pelayanan = $_POST['pelayanan'];

	$queryubah = "UPDATE tbl_pasien SET nama='$nama', tanggal_lahir='$tanggal_lahir', alergi='$alergi', gender='$gender', telp='$telp', alamat='$alamat', kota_lahir='$kota_lahir', pelayanan='$pelayanan', WHERE id='$id'";
	$simpandata = $conn->query($queryubah);
    // $queryubah = "UPDATE tbl_pasien (nama, tanggal_lahir, alergi, gender, telp, alamat, kota_lahir, pelayanan) VALUES ('$nama', '$tanggal_lahir','$alergi','$gender','$telp','$alamat','$kota_lahir','$pelayanan')";
    // $simpandata = $conn->query($queryubah);

	if ($simpandata) {
		echo "<script>alert('data berhasil disimpan');window.location='landing.php';</script>";
	} else {
		echo $conn->error ;
        echo "<script>alert('nt dek');window.location='tambahpasien.php';</script>";

		}
	}
	?>