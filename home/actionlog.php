<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "db_rumahsakit";

// koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// cek koneksi
if(!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
};

$errors = [];

if(isset($_POST['submit'])) {
  // tangkap nilai dari form
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // validasi nama
  if(empty($nama)) {
      $errors[] = "Nama harus diisi.";
  }

  // validasi email
  if(empty($email)) {
      $errors[] = "Email harus diisi.";
  } else {
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors[] = "Email tidak valid.";
      }
  }

  // validasi password
  if(empty($password)) {
      $errors[] = "Password harus diisi.";
  }

  // validasi konfirmasi password
  if($password !== $confirm_password) {
      $errors[] = "Konfirmasi password tidak sesuai.";
  }

  // jika tidak ada error, lakukan proses selanjutnya
  if(empty($errors)) {
      // enkripsi password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // query insert data ke tabel user
      $sql = "INSERT INTO user (email, password) VALUES ('$email', '$hashed_password')";

      // eksekusi query
    if(mysqli_query($conn, $sql)) {
        // arahkan user ke halaman home
        header("Location: index.html");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // tutup koneksi
    mysqli_close($conn);
}
}
?>

<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>