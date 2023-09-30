<?php

include 'config.php';
$err ="";

if (isset($_POST['submit'])) {
    $ID =$_POST['ID'];
    $NamaSantri =$_POST['NamaSantri'];
    $JenisDevice =$_POST['JenisDevice'];
    $Loker =$_POST['Loker'];
    $PenjagaDevice =$_POST['PenjagaDevice'];

    if (!empty($err)) {
        echo '<div class="error">' . $err . '</div>';
    }       

    if (!$koneksi) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO data_device (ID, `nama_santri`, `jenis_device`, `loker`, `penjaga_device`) VALUES ('$ID', '$NamaSantri', '$JenisDevice', '$Loker', '$PenjagaDevice')";


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
        <h1>Tambah Device</h1>
        <?php
        if ($err) {
            echo "<ul>$err</ul>";
        }
        ?>
        <form method="post">
            <div class="mb-3">
                <label for="ID" class="form-label">ID</label>
                <input type="Text" name="ID" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="NamaSantri" class="form-label">Nama Santri </label>
                <input type="Text" name="NamaSantri" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="JenisDevice" class="form-label">Jenis Device</label>
                <input type="Text" name="JenisDevice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Loker" class="form-label">Loker</label>
                <input type="Text" name="Loker" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="PenjagaDevice" class="form-label">Penjaga Device</label>
                <input type="Text" name="PenjagaDevice" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="submit" class="submit btn btn-primary">Tambah</button>
         </form>
    </div>
</body>

</html>