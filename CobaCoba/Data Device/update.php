<?php

include 'config.php';

$updateid = $_GET['updateid'];
$userSql = "SELECT * FROM data_device WHERE id='$updateid'";
$resultUser =mysqli_query($koneksi, $userSql);
$user = $resultUser->fetch_assoc();

$id=$_GET['updateid'];
if (isset($_POST['submit'])) {
    $NamaSantri =$_POST['NamaSantri'];
    $JenisDevice =$_POST['JenisDevice'];
    $Loker =$_POST['Loker'];
    $PenjagaDevice =$_POST['PenjagaDevice'];
    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }


    $sql = "UPDATE Data_Device SET nama_santri='$NamaSantri', jenis_device='$JenisDevice', loker='$Loker', penjaga_device='$PenjagaDevice' WHERE id=$id";

    $result =mysqli_query($koneksi, $sql);
    if ($result) {
        // echo "<script>alert('Tambah Santri Berhasil')</script>";
        header('location:display.php');
    } else {
        echo "<script>alert('Error!!')</script>" . mysqli_error($koneksi);
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <h1>Edit</h1>
        <!-- <a href="display.php" class="href">Back</a> -->
        <form method="post">
            <div class="mb-3">
                <label for="NamaSantri" class="form-label">Nama Santri </label>
                <input type="Text" name="NamaSantri" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['nama_santri'] ?>">
            </div>
            <div class="mb-3">
                <label for="JenisDevice" class="form-label">Jenis Device</label>
                <input type="Text" name="JenisDevice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['jenis_device'] ?>">
            </div>
            <div class="mb-3">
                <label for="Loker" class="form-label">Loker</label>
                <input type="Text" name="Loker" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['loker'] ?>">
            </div>
            <div class="mb-3">
                <label for="PenjagaDevice" class="form-label">Penjaga Device</label>
                <input type="Text" name="PenjagaDevice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['penjaga_device'] ?>">
            </div>
            <button type="submit" name="submit" class="submit btn btn-primary">Edit</button>
         </form>
    </div>
</body>

</html>