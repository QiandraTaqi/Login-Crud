<?php
session_start();
if (isset($_SESSION['admin_username'])) {
    header("location:Data Device/display.php");
}
include("koneksi.php");
$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "<script>alert('masukan password dan username');</script>";
    }
    if (empty($err)) {
        $sql1 = "select * from users where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        if (!$q1) {
            die("Query SQL error: " . mysqli_error($koneksi));
        }
        $r1 = mysqli_fetch_array($q1);

        // var_dump($r1['password'], md5($password));
    
        if ($r1['password'] != md5($password)) {
            $err .= "<script>alert('akun tidak ditemukan');</script>";
        }
    }
    
    if (empty($err)) {
        $_SESSION['admin_username'] = $username;
        header("location:Data Device/display.php");
        exit();
    }
    
}
?>
<!DOCTYPE html>
<html lang="en" class="bg-gradient-to-r from-cyan-500 to-blue-500"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Plus+Jakarta+Sans">
</head>

<body>
    <div id="app">
        <h1 class="text-3xl mt-3 mb-3">Halaman Login</h1>
        <?php
        if ($err) {
            echo "<ul>$err</ul>";
        }
        ?>
        <form action="" method="post">
            <input type="text" value="<?php echo $username ?>" name="username" class="input" placeholder="Username..." /><br /><br />
            <input type="password" name="password" class="input" placeholder="Password..." /><br /><br />
            <input class="text-white rounded-md bg-gradient-to-r from-cyan-500 to-blue-500 ml-44 p-2 border-indigo-500 hover:shadow-lg hover:shadow-indigo-500/50 hover:ease-in duration-300" type="submit" name="login" class="button" value="Login" />
        </form><br><br>
        <p>Belum punya akun? <a href="register.php" class="text-cyan-600">Register!</a></p>
    </div>
</body>

</html>
