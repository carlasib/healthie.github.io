<?php
    require "conn.php";

    $nama = htmlspecialchars($_GET['nama']);
    $queryResep = mysqli_query($con, "SELECT * FROM resep WHERE nama='$nama'");
    $resep = mysqli_fetch_array($queryResep);
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="ini.css">
    <title>Hello, world!</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-2 mb-4">
      <div class="container">
        <div class="collapse navbar-collapse order-1 order-lg-0 dual-collapse2" id="navbarNav">
          <ul class="navbar-nav fs-5">
            <li class="nav-item me-auto">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="resep.php">Resep</a>
            </li>
          </ul>
        </div>
        <div class="ms-auto order-0">
          <a class="navbar-brand mx-auto fs-2" href="#" style="color: #84D2C5; font-weight: 600; font-family: 'Playfair Display', serif">Healthie</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse order-3 dual-collapse2" id="navbarNav">
          <ul class="navbar-nav ms-auto fs-5" >
            <li class="nav-item me-2">
              <a class="nav-link" aria-current="page"  href="calorie.php">Cal Calories</a>
            </li>
            
            <li class="nav-item d-flex">
            <a class="nav-link btn btn-outline-secondary" href="admin/dashboard.php" style="height:40px">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid img-detail d-flex align-items-center mb-4" style="background-image:url('image/<?php echo $resep['foto']; ?>')">   
    </div>

      <div class="container">
        <div class="row mb-4">
          <!--Nama resep+ Kalori-->
            <div class="col-5">
            <h3 class=""><?php echo $resep['nama']; ?></h3>
            <h5 class="mb-6"><?php echo $resep['kalori']; ?></h5>
        </div>

        <div class="row">
          <div class="col-md">
          <h5 class="mt-5">Bahan-bahan</h5>
              <p><?php echo $resep['resep']; ?></p>
          </div>
          <div class="col-md">
          <h5 class="mt-5">Langkah Pengolahan</h5>
              <p><?php echo $resep['detail']; ?></p>
          </div>
      </div>
      </div>
    </div>

    <div class="d-flex min-vw-90" style=" background-color: #8fbcaa">
      <div class="d-flex flex-grow-1 justify-content-center align-items-center">
        <div class="row">
          <div class="col">
          <a class="  fs-2 text-white mb-4 ms-5" href="#" style="color: #84D2C5;text-decoration:none; font-weight: 600; font-family: 'Playfair Display', serif">Healthie</a>
          <p class="text-center mt-2"> &copy; 2023 Developed by Carla </p>
          </div>
        </div>
        
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>