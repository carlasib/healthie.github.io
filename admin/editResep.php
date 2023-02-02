<?php
    require "session.php";
    require "../conn.php";

    $id = $_GET['id'];

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM resep a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data = mysqli_fetch_array($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");
    
    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Detail Resep</title>
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
              <a class="nav-link active" href="resep.php">Resep</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Kategori.php">Kategori</a>
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
    <h5 class="my-3">Detail Resep</h5>

    <div class="col-6">
      
        <form action="" method="post" enctype="multipart/form-data">
          <div class="mb-2">
            <label class=" text-muted" for="nama">Nama Resep</label>
            <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" >        
          </div>
          <div class="mb-2">
            <label class=" text-muted" for="kategori">Kategori</label>
              <select name="kategori" id="kategori" class="form-control">
                <option value="<?php echo $data['kategori_id']; ?>"> <?php echo $data['nama_kategori'];?></option>
                <?php
                while($dataKategori=mysqli_fetch_array($queryKategori)){
                  ?>
                  <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
                  <?php
                }
                ?>
              </select>
          </div>
          <div class="mb-2">
            <label for="currentFoto">Foto Resep Sekarang</label>
            <img src="../image/<?php echo $data['foto'] ?>" width=300>
          </div>
          <div class="mb-2">
              <label class=" text-muted" for="foto">Foto</label>
              <input type="file" id="foto" name="foto" class="form-control">
          </div>
          <div class="mb-2">
            <label class=" text-muted" for="kalori">Kalori</label>
            <input type="text" id="kalori" name="kalori" value="<?php echo $data['kalori']; ?>" class="form-control">
        </div>
        <div class="mb-2">
          <label class=" text-muted" for="resep">Resep</label>
          <textarea name="resep" id="resep" cols="30" rows="10" class="form-control">
            <?php echo $data['resep'] ?>
          </textarea>
        </div>
        <div class="mb-2">
          <label class=" text-muted" for="detail">Detail</label>
          <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
          <?php echo $data['detail'] ?>
          </textarea>
        </div>
        <div class="mb-3">
          <button type="submit" name="update" class="btn btn-primary" >Update</button>
          <button type="submit" class="btn btn-danger ms-3" name="delete">Dalete</button>
        </div>
      </form>
      <?php
        if(isset($_POST['update'])){
          $nama = $_POST['nama'];
          $kategori = $_POST['kategori'];
          $kalori = $_POST['kalori'];
          $resep = $_POST['resep'];
          $detail = $_POST['detail'];

          $target_dir = "../image/";
          $nama_file = basename($_FILES["foto"]["name"]);
          $target_file = $target_dir . $nama_file;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $image_size = $_FILES["foto"]["size"];
          $random_name = generateRandomString(20);
          $new_name = $random_name . "." . $imageFileType;

          if($nama=='' || $kategori=='' || $resep=='' || $detail==''){
      ?>
                    <div class="alert alert-warning mt-2" role="alert">
                    Nama, Kategori, resep dan detail wajib di isi
                  </div>
      <?php
                }
                else{
                  $queryUpdate = mysqli_query($con,"UPDATE resep SET kategori_id='$kategori',
                  nama='$nama', kalori='$kalori', resep='$resep', detail='$detail' WHERE id='$id'");

                  if($nama_file!=''){
                    if($image_size > 5000000){
      ?>  
                          <div class="alert alert-warning mt-2" role="alert">
                              file tidak boleh melebihi 500 Kb
                          </div>
      <?php
                  }
                  else{
                    if($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png'){
      ?>
                      <div class="alert alert-warning mt-2" role="alert">
                        file wajib bertipe jpg,jpeg,png
                      </div>
      <?php
                    }
                    else{
                      move_uploaded_file($_FILES["foto"]["tmp_name"], 
                      $target_dir . $new_name);

                      $queryUpdate = mysqli_query($con, "UPDATE resep SET foto='$new_name' WHERE id='$id'");

                      if($queryUpdate){
      ?>
                        <div class="alert alert-primary mt-2" role="alert">
                              Resep berhasil terupdate
                        </div>
            
                            <meta http-equiv="refresh" content="0.3; url=resep.php"/>

      <?php
                      }
                      else{ 
                        echo mysqli_error($con);
                      }
                    }
                  }
                }
              }
        }
        if(isset($_POST['delete'])){
          $queryHapus = mysqli_query($con, "DELETE FROM resep WHERE id='$id'");

          if($queryHapus){
            ?>
              <div class="alert alert-danger mt-2" role="alert">
                  Resep berhasil di hapus
                </div>
                
                <meta http-equiv="refresh" content="0.9; url=resep.php"/>
            <?php
          }
        }
      ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>