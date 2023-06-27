<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
      src="https://kit.fontawesome.com/df0f840718.js"
      crossorigin="anonymous"
    ></script>    
    <link rel="stylesheet" href="tampildata.css">
</head>
<body>
    <div class="container">
        <div class="judul">
    <h1>Data Obat</h1><a class="btn-tambah" href="td_pasien.html">Tambah Data</a>
</div>
    <table class="ctn-table" style="width: 100%;">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Katerogi</th>
            <th>Stok Obat</th>
            <th>Harga Umum</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        // Memanggil file
        include 'koneksi.php';
        $no = 1;
        $tampilsiswa = $conn->query("SELECT * FROM tbl_obat");

        while ($row = $tampilsiswa -> fetch_array()) {
            ?>
            <tr>    
                    <td><?php echo $row['id_obat'] ?></td>
                    <td align="center"><?php echo $row['nama_obat'] ?></td>
                    <td align="center"><?php echo $row['kategori'] ?></td>
                    <td align="center"><?php echo $row['stok'] ?></td>
                    <td align="center"><?php echo $row['harga'] ?></td>
                    <td align="center"><?php echo $row['keterangan'] ?></td>
                    
                    <!-- <td><a href="hapusdata.php?id=<?php echo $row['id']; ?>">hapus</a>
                    <a href="ubahdata.php?id=<?php echo $row ['id']; ?>">ubah</a></td> -->
                    <td class="btn"><a class="btn-ubah" href="ud_apotek.html"><i class="fa-regular fa-pen-to-square"></i></a><a class="btn-hapus" href=""><i class="fa-regular fa-trash-can"></i></a></td>
            </tr>;
       <?php $no++;
        }
        ?>
        </tr>
    </tbody>
    </table>
</div>
</body>
</html>