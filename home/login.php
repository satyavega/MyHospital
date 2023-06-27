<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyHospital</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/df0f840718.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
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
                <h2>Login</h2>
                <form method="post" action="">
                    <div class="inputBox">
                        <span>Username</span>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="inputBox">
                        <span>Password</span>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="remember">
                        <label><input type="checkbox" name=""> Remember me</label>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Masuk" name="login">
                    </div>
                    <div class="inputBox">
                        <p>Belum punya akun?<a href="register.php"> Register</a> Disini!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rumahsakit";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            echo "<script>alert('angjay');window.location='landing.php';</script>";
        } else {
            echo "Password salah";
        }   
    } elseif ($username == "admin" && $password == "admin123"){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "admin";

        header("location: landingadmin.php");
    } else {
        echo "Username or Password is Invalid!";
    }
} 
?>