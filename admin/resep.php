<?php
    require "session.php";
    require "../conn.php";

    $query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM resep a JOIN kategori b ON a.kategori_id=b.id");
    $jumlahResep = mysqli_num_rows($query);

    $queryKategori = mysqli_query($con, "SELECT * FROM kategori");

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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Resep</title> 
  </head>
  <body>
    <!-- NAVBAR-->
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
    
    <!--FORM-->
    <div class="container ">
    <h5 class="mt-5">Tambah Resep</h5>
    
    <div class="col-sm-4 mb-5">
      <form method="POST" class="needs-validation" novalidate="" autocomplete="off" enctype="multipart/form-data">
        <div class="mb-2">
          <label class=" text-muted" for="nama">Nama Resep</label>
          <input type="text" id="nama" name="nama" class="form-control" >
        </div>
        <div class="mb-2">
          <label class=" text-muted" for="kategori">Kategori</label>
          <select name="kategori" id="kategori" class="form-control">
            <?php
            while($data=mysqli_fetch_array($queryKategori)){
              ?>
              <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="mb-2">
          <label class=" text-muted" for="foto">Foto</label>
          <input type="file" id="foto" name="foto" class="form-control">
        </div>
        <div class="mb-2">
          <label class=" text-muted" for="kalori">Kalori</label>
          <input type="text" id="kalori" name="kalori" class="form-control">
        </div>
        <div class="mb-2">
          <label class=" text-muted" for="resep">Resep</label>
          <textarea name="resep" id="resep" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-2">
          <label class=" text-muted" for="detail">Detail</label>
          <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="">
          <button type="submit" name="simpanResep" class="btn btn-primary" style="background-color: green" required>Save</button>
        </div>


      </form>
      <?php
        if(isset($_POST['simpanResep'])){
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
              file wajib bertipe jpg/jpeg/png
          </div>
      <?php
                }
                else{
                  move_uploaded_file($_FILES["foto"]["tmp_name"], 
                  $target_dir . $new_name);
                }
              }
            }  
            //Query Insert
            $queryTambah = mysqli_query($con, "INSERT INTO resep (kategori_id, nama, foto, kalori, resep, detail) 
            VALUES ('$kategori', '$nama', '$new_name', '$kalori', '$resep', '$detail')");

            if($queryTambah){
      ?>
            <div class="alert alert-primary mt-2" role="alert">
              Resep berhasil tersimpan
            </div>
            
            <meta http-equiv="refresh" content="0.3; url=resep.php"/>

      <?php
            }
            else{
              echo mysqli_error($con);
            }
          }
        }
      ?>
    </div>  
    
    
  </div>
    <!--LIST-->
    <div class="container ">
  <h5 class="">List Resep</h5>
  <table class="table table-bordered">
  <thead class="">
    <tr>
      <th scope="col" class="">No.</th>
      <th scope="col" class="col-1">Nama</th>
      <th scope="col" class="">Kategori</th>
      <th scope="col" class="col-1">Foto</th>
      <th scope="col" class="col-4">Resep</th>
      <th scope="col" class="col-4">Detail</th>
      <th scope="col" class="col-2">Edit</th>
    </tr>
  </thead>
  <tbody> 
    <?php
      if($jumlahResep==0){
        ?>
        <tr >
          <td colspan=6 class="text-center">Data resep tidak tersedia</td>
        </tr>
        <?php
      }
      else{
        $jumlah = 1;
        while($data=mysqli_fetch_array($query)){
          ?>
          <tr>
            <td><?php echo $jumlah; ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['nama_kategori'] ?></td>
            <td><img src="../image/<?php echo $data['foto']?>" alt="" width=200></td>
            <td><?php echo $data['resep'] ?></td>
            <td><?php echo $data['detail'] ?></td>
            <td scope="" class=""><a href="editResep.php?id=<?php echo $data['id']; ?>" class="btn btn-primary btn-sm" name="edit">Edit Resep</a></td>
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