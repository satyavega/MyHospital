<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/df0f840718.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="imgBox">

            <h1><span class="text1" style=" color:#4fcca3; --index: 0; --alpha-l: 0.5; --alpha-u: 1;"><i
                        class="fa-solid fa-heart-pulse"></i></span><span class="text1"
                    style=" color:#4fcca3; --index: 0; --alpha-l: 0.5; --alpha-u: 1;">M</span><span class="text2"
                    style=" color:#4fcca3; --index: 1; --alpha-l: 0.5; --alpha-u: 1;">y</span><span
                    style=" color:#4fcca3; --index: 2; --alpha-l: 0.5; --alpha-u: 1;">H</span><span
                    style=" color:#4fcca3; --index: 3; --alpha-l: 0.5; --alpha-u: 1;">o</span><span
                    style=" color:#4fcca3; --index: 4; --alpha-l: 0.5; --alpha-u: 1;">s</span><span
                    style=" color:#4fcca3; --index: 5; --alpha-l: 0.5; --alpha-u: 1;">p</span><span
                    style=" color:#4fcca3; --index: 6; --alpha-l: 0.5; --alpha-u: 1;">i</span><span
                    style=" color:#4fcca3; --index: 7; --alpha-l: 0.5; --alpha-u: 1;">t</span><span
                    style=" color:#4fcca3; --index: 8; --alpha-l: 0.5; --alpha-u: 1;">a</span><span
                    style=" color:#4fcca3; --index: 9; --alpha-l: 0.5; --alpha-u: 1;">l</span>
            </h1>
        </div>
        <div class="ctnBox">
            <div class="formBox">
                <h2>Register</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="inputBox">
                        <span>Username</span>
                        <input type="text" id="username" name="username">
                    </div>
                    <div class="inputBox">
                        <span>Email</span>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="inputBox">
                        <span>Password</span>
                        <input type="password" id="password" name="password">
                    </div>
                    <div class="inputBox">
                        <span>Konfirmasi Password</span>
                        <input type="password" id="confirm_password" name="confirm_password">
                    </div>
                    <div class="remember">
                        <label><input type="checkbox" name=""> Remember me</label>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Daftar Akun" name="submit">
                    </div>
                    <div class="inputBox">
                        <p>Sudah punya akun?<a href="login.html"> Login</a> Disini!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

    <?php
    if(isset($_POST['submit'])) {
        include 'koneksi.php';
    // tangkap nilai dari form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // validasi username
    if(empty($username)) {
        $errors[] = "username harus diisi.";
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
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        // eksekusi query
        if(mysqli_query($conn, $sql)) {
            // arahkan user ke halaman home
            header("Location: login.php");
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