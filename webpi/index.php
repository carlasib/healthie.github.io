<?php
  require "conn.php";

  $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
  $queryResep = mysqli_query($con, "SELECT * FROM resep LIMIT 3");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet" />
    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-2">
      <div class="container">
        <div class="collapse navbar-collapse order-1 order-lg-0 dual-collapse2" id="navbarNav">
          <ul class="navbar-nav fs-5">
            <li class="nav-item me-auto">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="resep.php">Resep</a>
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

    <!-- Start Jumbotron -->
    <div class="container" style="height: 80vh">
      <div class="row align-items-center mt-5">
        <div class="col-6">
          <div class="mb-4">
          <h1 style="font-family: Playfair Display" class="">
            Mari Temukan <br />
            Makanan diet yang menarik<br/>
          </h1>
          </div>
          <div class="">

          <p class="">Diet menjadi menyenangkan dengan makanan yang menarik</p>
          <a class="btn btn-outline-dark rounded-pill px-4" href="resep.php" role="button">Cari Resep</a>
          </div>
          
        </div>
        <div class="col-5 offset-1">
          <img src="jumbotron.png" alt="" style="width: 100%" />
        </div>
      </div>
    </div>
    <!-- End Jumbotron -->

    <!-- Start Home -->

    <!-- Start sub bab1 -->
    <div class="container-fluid py-2" style="background-color: #383838">
      <div class="container">
        <h4 style="font-family: Playfair Display; color: antiquewhite" class="text-center my-3">APA ITU DIET?</h4>
        <p class="text-center" style="color: antiquewhite">
          Diet pada dasarnya adalah pola makan, yang cara dan jenis makanannya diatur menurut kebutuhan dari masing-masing individu.
          Dengan mengatur asupan makanan yang kita konsumsi dengan mengurangi makanan berlemak dan memperbanyak asupan yang bergizi
           maka badan akan menjadi lebih sehat.
        </p>
      </div>
    </div>
    <!-- End sub bab1 -->
    <div class="container ">
      <h4 style="font-family: Playfair Display; color: #383838" class="text-center my-4">Manfaat Diet</h4>
      <div class="row mb-5">
        <div class="col-3 mx-auto">
          <div class="card shadow" style="height: 15rem">
            <img
              src="https://img.freepik.com/free-photo/smiling-sports-woman-standing-with-arms-folded-looking-camera-isolated-white-wall_231208-1692.jpg?w=996&t=st=1651339930~exp=1651340530~hmac=9be7ac89dba7c7c1626f31bd5792c5a68f76b9792ef44c813180ea9fa1282c31"
              class="card-img-top "
              style="height: 10rem"
              alt="..."
            />
            <div class="card-body">
              <p class="card-title text-center">Membentuk badan ideal</p>
            </div>
          </div>
        </div>
        <div class="col-3 mx-auto">
          <div class="card shadow" style="height: 15rem">
            <img
              src="image/kolestrol.jpg"
              class="card-img-top "
              style="height: 10rem"
              alt="..."
            />
            <div class="card-body">
              <p class="card-title text-center">Menurunkan kadar kolestrol</p>
            </div>
          </div>
        </div>
        <div class="col-3 mx-auto">
          <div class="card shadow" style="height: 15rem">
            <img
              src="image/ilustrasi-jantung-sehat_20160415_084630.jpg"
              class="card-img-top img-fluid "
              style="height: 10rem"
              alt="..."
            />
            <div class="card-body">
              <p class="card-title text-center">Menyehatkan Jantung</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Start Fav Recipe -->
    <div class="container-fluid pb-5  " style="background-color: antiquewhite">
      <h4 style="font-family: Playfair Display; color: #383838" class="fw-bolder text-center my-4 pt-3">Resep yang menarik untuk dicoba</h4>
      <div class="row ">
          <?php while($resep = mysqli_fetch_array($queryResep)){ ?>
          <div class="col-3 mx-auto mt-2">
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
    

    <!-- End Fav Recipes-->
    <!-- End Home -->

    
          
    <!-- Footer -->
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
    <!-- Footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
