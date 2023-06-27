<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tampildata.css">
</head>
<body>
    <div class="container">
        <div class="judul">
    <h1>Data Pasien</h1><a class="btn-tambah" href="tambahpasien.php">Tambah Data</a>
</div>
    <table class="ctn-table" style="width: 100%;">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Kota Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Gender</th>
            <th>ALamat</th>
            <th>No Telp</th>
            <th>Alergi</th>
            <th>Pelayanan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Memanggil file
        include 'koneksi.php';
        $no = 1;
        $tampildata = $conn->query("SELECT * FROM tbl_pasien");

        while ($row = $tampildata -> fetch_array()) {
            ?>
            <tr>    
                    <td><?php echo $row['id_pasien'] ?></td>
                    <td align="center"><?php echo $row['nama'] ?></td>
                    <td align="center"><?php echo $row['kota_lahir'] ?></td>
                    <td align="center"><?php echo $row['tanggal_lahir'] ?></td>
                    <td align="center"><?php echo $row['gender'] ?></td>
                    <td align="center"><?php echo $row['alamat'] ?></td>
                    <td align="center"><?php echo $row['telp'] ?></td>
                    <td align="center"><?php echo $row['alergi'] ?></td>
                    <td align="center"><?php echo $row['pelayanan'] ?></td>
                    <td class="btn"><a class="btn-ubah" href="ud_pasien.php">Ubah</a><a class="btn-hapus" href="hapusdata.php?id=<?php echo $row['id_pasien']; ?>">Hapus</a></td>
            </tr>;
       <?php $no++;
        }
        ?>
    </tbody>
    </table>
</div>
</body>
</html>
