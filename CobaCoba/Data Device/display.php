<?php 

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
<h1 class="mt-5 ms-5"><b>Data Device</b></h1>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="user.php" class="text-light text-decoration-none">Tambah Santri</a></button>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama Santri</th>
      <th scope="col">Device</th>
      <th scope="col">Penjaga</th>
      <th scope="col">Loker</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>

  <a href="../logout.php" class="btn btn-danger">Logout</a>

    <?php 
    
    $sql = "SELECT * FROM data_device";

    $result=mysqli_query($koneksi, $sql);
    if ($result) {
        while($row=mysqli_fetch_assoc($result)) {
          $ID = $row['ID'];
          $NamaSantri = $row['nama_santri'];
          $JenisDevice = $row['jenis_device'];
          $Loker = $row['loker'];
          $PenjagaDevice = $row['penjaga_device'];
          
            echo '
            <tr>
              <th scope="row">'.$ID.'</th>
              <td>'.$NamaSantri.'</td>
              <td>'.$JenisDevice.'</td>
              <td>'.$PenjagaDevice.'</td>
              <td>'.$Loker.'</td>
              <td>
                <button class="btn btn-primary"><a class="text-light text-decoration-none" href="update.php?updateid='.$ID.'">Edit</a></button>
                <button class="btn btn-danger"><a class="text-light text-decoration-none" href="delete.php?deleteid='.$ID.'">Delete</a></button>
              </td>
            </tr>

            ';
        }
      }

    ?>


  </tbody>
</table>
    </div>

</body>
</html>
