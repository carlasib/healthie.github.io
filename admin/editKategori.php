<?php
    require "session.php";
    require "../conn.php";

    $id = $_GET['id'];

    $query = mysqli_query($con, "SELECT * FROM kategori WHERE id='$id'");
    $data = mysqli_fetch_array($query);
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit kategori</title>
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

  <div class="container">

    <h5 class="my-3">Tambah Kategori</h5>
    <div class="col-sm-4">
      <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
        <div class="mb-3">
          <label class="mb-2 text-muted" for="kategori">Masukkan nama kategori</label>
          <input id="kategori" type="text" class="form-control" name="kategori" value="<?php echo $data['nama']; ?>" required autofocus />
        </div>
        <div class="">
          <button type="submit" name="edit" class="btn btn-primary" >Rename</button>
          <button type="submit" class="btn btn-danger ms-3" name="delete">Dalete</button>
        </div>
      </form>
      <?php
        if(isset($_POST['edit'])){
          $kategori = $_POST['kategori'];

          if($data['nama']==$kategori){
          echo '<meta http-equiv="refresh" content="0; url=kategori.php"/>'; 
          }
          else{
            $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama='$kategori'");
            $jumlahData = mysqli_num_rows($query);

            if($jumlahData>0){
              ?>
                <div class="alert alert-danger mt-2" role="alert">
                  Kategori sudah tersedia
                </div>
              <?php
            }
            else{
              $querySimpan = mysqli_query($con, "UPDATE kategori SET nama='$kategori' WHERE id='$id'");
                ?>
                <div class="alert alert-primary mt-2" role="alert">
                  Kategori berhasil di perbarui
                </div>
                
                <meta http-equiv="refresh" content="0.5; url=kategori.php"/>
                <?php 
              
            }
          }
          
          
        }
        if(isset($_POST['delete'])){
          $queryCheck = mysqli_query($con, "SELECT * FROM resep WHERE kategori_id='$id'");
          $dataCount = mysqli_num_rows($queryCheck);

          


          $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");
          
          if($queryDelete){
            ?>
              <div class="alert alert-danger mt-2" role="alert">
                  Kategori berhasil di hapus
                </div>
                
                <meta http-equiv="refresh" content="0.7; url=kategori.php"/>
            <?php
          }
          else{
            
            ?>
              <div class="alert alert-warning mt-2" role="alert">
                  Kategori tidak dapat dihapus karna sudah digunakan pada resep
                </div>
            <?php
          }
        }
        
      ?>
    </div>  
    
    
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>