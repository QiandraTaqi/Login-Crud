<?php

include 'config.php';
if (isset($_GET['deleteid'])) {
    $ID=$_GET['deleteid'];

    $sql = "DELETE FROM Data_Device WHERE id = $ID";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        header("location:display.php");
    } else {
        die(mysqli_error($koneksi));
    }
}

?>