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
        $getdata = $conn->query("SELECT * FROM tbl_obat WHERE id='" . $_GET['id'] . "'");
        $row = $getdata->fetch_array();
    } else {
        // berikan nilai default untuk $row jika $_GET['id'] tidak ada
        $row = array('nama_obat' => '', 'kategori' => '', 'stok' => '', 'harga' => '', 'keterangan' => '');
    }
?>

    <div class="container">
                <h2>Ubah Data Obat</h2>
                <form action="" method="post">
                <div class="sec-container">
                    <div class="input-box">
                        <span>Nama Obat</span>
                        <input type="text" name="nama_obat" placeholder="Masukkan Nama Obat" value="<?= $row['nama_obat']?>" required>
                    </div>
                    <div class="input-box">
                        <span>kategori</span>
                        <input type="text" name="kategori" placeholder="Masukkan kategori Obat" value="<?= $row['kategori']?>" required>
                    </div>
                    <div class="input-box">
                        <span>Stok</span>
                        <input type="text" name="stok" placeholder="Masukkan Stok Obat" value="<?= $row['stok']?>" required>
                    </div>
                    <div class="input-box">
                        <span>Harga Umum</span>
                        <input type="number" name="harga" placeholder="Masukkan Harga Obat" value="<?= $row['harga']?>" required>
                    </div>
                    <div class="input-box">
                        <span>Keterangan</span>
                        <textarea name="keterangan" class="textarea" cols="90" rows="2" placeholder="Masukkan Keterangan Obat" value="<?= $row['keterangan']?>" required></textarea>
                    </div>
                </div>
                    <div class= "input-box">
                        <input type="submit" value="Ubah Data" name="tbubah"><script>alert('Gak suka zinah, lebih suka Booyah anjas slebew')</script>
                     </div>
            </form>
            </div>
</body>
</html>
<?php
	if (isset($_POST['tbubah'])) {
		include 'koneksi.php';
		$id = $_POST['id'];
        $nama_obat = $_POST['nama_obat'];
		$kategori = $_POST['kategori'];
		$stok = $_POST['stok'];
		$harga = $_POST['harga'];
		$keterangan = $_POST['keterangan'];

	$queryubah = "UPDATE tbl_obat SET nama_obat='$nama_obat', kategori='$kategori', stok='$stok', harga='$harga', keterangan='$keterangan', WHERE id='$id'";
	$simpandata = $conn->query($queryubah);

	if ($simpandata) {
		echo "<script>alert('data berhasil disimpan');window.location='landing.php';</script>";
	} else {
		echo $conn->error ;
        echo "<script>alert('nt dek');window.location='tambahpasien.php';</script>";

		}
	}
	?>