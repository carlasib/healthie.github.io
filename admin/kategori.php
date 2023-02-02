<?php
    require "session.php";
    require "../conn.php";

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="This is a login page template based on Bootstrap 5" />
    <title>Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <link rel="stylesheet" href="../style.css">
  </head>

  <body>

  <!--NAVBAR -->
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
              <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="resep.php">Resep</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Kategori.php">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div> 

  <!--INPUT FROM -->
  <div class="container ">
    <h5 class="mt-5">Tambah Kategori</h5>
    
    <div class="col-sm-4 mb-5">
      <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
        <div class="mb-2">
          <label class="mb-2 text-muted" for="kategori">Masukkan nama kategori</label>
          <input id="kategori" type="text" class="form-control" name="kategori" value="" required autofocus />
        </div>
        <div class="">
          <button type="submit" name="simpanKategori" class="btn btn-primary" style="background-color: green">Save</button>
        </div>
      </form>
      <?php
        if(isset($_POST['simpanKategori'])){
          $kategori = $_POST['kategori'];

          $queryTersedia = mysqli_query($con, "SELECT nama FROM kategori WHERE nama='$kategori'");
          $jumlahData = mysqli_num_rows($queryTersedia);
          
          if($jumlahData>0){
            ?>
            <div class="alert alert-danger mt-2" role="alert">
              Kategori sudah tersedia
            </div>
            <meta http-equiv="refresh" content="1; url=kategori.php"/>
            <?php
           }
          else{
            $querySimpan = mysqli_query($con, "INSERT kategori(nama) VALUES ('$kategori')");
            ?>
            <div class="alert alert-primary mt-2" role="alert">
              Kategori berhasil tersimpan
            </div>
            
            <meta http-equiv="refresh" content="0.3; url=kategori.php"/>
            <?php
          } 
        }
      ?>
    </div>  
    
    
  </div>
  <!--TABLE KATEGORI-->
  <div class="container ">
  <h5 class="">List Kategori</h5>
  <table class="table table-bordered">
  <thead class="">
    <tr>
      <th scope="col" class="col-2">No.</th>
      <th scope="col" class="col-5">Nama</th>
      <th scope="col" class="col-2">Edit</th>
    </tr>
  </thead>
 
  <tbody>
    <?php
      if($jumlahKategori==0){
    ?>
      <tr>
        <td class="text-center"colspan=3>Data Kategori Tidak Tersedia</td>
      </tr>
    <?php
      }
      else{
        $jumlah = 1;
        while($data=mysqli_fetch_array($queryKategori)){
    ?>
      <tr>
        <td scope="" class=""><?php echo $jumlah; ?></td>
        <td scope="" class=""><?php echo $data['nama']; ?></td>
        <td scope="" class=""><a href="editKategori.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm" name="edit">Edit Kategori</a></td>
        
        
      </tr>
    <?php
        $jumlah++;
          
        }
        }
        
    ?>
  </tbody>
</table>
  
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>