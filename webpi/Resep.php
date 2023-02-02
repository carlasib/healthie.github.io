<?php
    require "conn.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

    //menampilkan resep secara search
    if(isset($_GET['keyword'])){
        $queryResep = mysqli_query($con, "SELECT * FROM resep WHERE nama LIKE '%$_GET[keyword]%'");
    }
    //menampilkan resep secara kategori
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);
        
        $queryResep = mysqli_query($con, "SELECT * FROM resep WHERE kategori_id='$kategoriId[id]'");
    }
    //menampilkan resep secara default
    else{
        $queryResep = mysqli_query($con, "SELECT * FROM resep");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="ini.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-2">
      <div class="container">
        <div class="collapse navbar-collapse order-1 order-lg-0 dual-collapse2" id="navbarNav">
          <ul class="navbar-nav fs-5">
            <li class="nav-item me-auto">
              <a class="nav-link " aria-current="page" href="index.php">Home</a>
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
    <!-- End Navbar -->

    <!-- Carousel -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container">
            <div class="col-md-8 offset-md-2">
              <form action="resep.php" method="get">
                <div class="input-group my-4 ">
                    <input type="text" name="keyword"  class="form-control" placeholder="Cari Resep" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn warna1 px-4"  type="submit" id="button-addon2">cari</button>
                </div>
              </form>  
            </div>
        </div>
    </div>
    <!-- End Carousel -->

    <!-- Start Recipes -->

    <div class="container ">
        <h2 class="text-center my-4" style="font-family: Playfair Display; color: #383838">Resep</h2>
        <div class="my-4 d-flex justify-content-center">
            <ul class="list-group list-group-horizontal">
                <?php while($kategori = mysqli_fetch_array($queryKategori)){?>
                <a class="no-decoration"href="resep.php?kategori=<?php echo $kategori['nama']; ?>">
                    <li class="list-group-item no-decoration"><?php echo $kategori['nama']; ?></li>
                </a>
                <?php }?>
            </ul>  
        </div>
        <div class="">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php while($resep = mysqli_fetch_array($queryResep)){ ?>
                <div class="col mb-3">
                    <div class="card" style=" height: 350px;">
                        <img src="image/<?php echo $resep['foto']; ?>" style="height: 150px" class="card-img-top" alt="">
                    <div class="card-body">
                          <h5 class="card-title text-center"><?php echo $resep['nama'] ?></h5>
                          <p class="card-text text-center"><?php echo $resep['kalori'] ?></p>
                          <div class="text-center"><a href="detailResep.php?nama=<?php echo $resep['nama']; ?>" class="btn btn-outline-dark ">Lihat Resep</a></div>
                          
                    </div>
                    </div>
                </div>
                <?php } ?>
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

    <!-- End Recipes -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
