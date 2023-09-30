<?php 
require ("koneksi.php");

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }    
    $duplicate = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username sudah digunakan');</script>";
    } else {
        if ($password == $confirmpassword) {
            $encrypt = md5($password);
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$encrypt')";
            mysqli_query($koneksi, $query);
            echo "<script>alert('Registrasi Berhasil');</script>";
        } else {
            echo "<script>alert('Password tidak cocok');</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="app">
        <h1>Halaman Register</h1>
        <form action="" method="post">
            <input type="text" name="username" class="input" placeholder="Username" /><br /><br />
            <input type="password" name="password" class="input" placeholder="Password" /><br /><br />
            <input type="password" name="confirmpassword" class="input" placeholder="Confirm Password"><br /><br />
            <input type="submit" name="submit" class="button" value="Register" />
        </form><br>
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</body>

</html>