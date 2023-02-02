<?php
    require "session.php";
    require "../conn.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryResep = mysqli_query($con, "SELECT * FROM resep");
    $jumlahResep = mysqli_num_rows($queryResep);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Muhamad Nauval Azhar" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="This is a login page template based on Bootstrap 5" />
    <title>Halo Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  </head>

  <body>
    <div class="container-fluid bg-dark">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="../index.php">Healthie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="resep.php">Resep</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Kategori.php">Kategori</a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
      </nav>
    </div> 
    
    <div class="container">
    <h3 class="border my-4 p-2" >Welcome to admin site</h3>
      <div class="row">
        <div class="col-md-2 mb-3">
        <div class="card py-2 bg-success bg-gradient">
          <div class="card-body text-white">
            <h5 class="card-title">Kategori</h5>
            <p class="card-text"><?php echo $jumlahKategori; ?> Kategori</p>
            
          </div>
        </div>
        </div>
        <div class="col-md-2">
        <div class="card py-2 bg-success bg-gradient">
          <div class="card-body text-white">
            <h5 class="card-title">Resep</h5>
            <p class="card-text"><?php echo $jumlahResep ?> Resep</p>
            
          </div>
        </div>
        </div>
      </div>
    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
