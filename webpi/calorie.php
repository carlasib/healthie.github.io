<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>Calorie Calculator</title>

    <style>
      #loading,
      #results {
        display: none;
      }
      #loading {
        width: 100%;
      }
    </style>
  </head>
  <body class="bg-light">
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-2">
      <div class="container">
        <div class="collapse navbar-collapse order-1 order-lg-0 dual-collapse2" id="navbarNav">
          <ul class="navbar-nav fs-5">
            <li class="nav-item me-auto">
              <a class="nav-link " aria-current="page" href="index.php">Home</a>
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
            <li class="nav-item">
              <a class="nav-link active me-2" aria-current="page"  href="calorie.php">Cal Calories</a>
            </li>
            
            <li class="nav-item d-flex">
            <a class="nav-link btn btn-outline-secondary" href="admin/dashboard.php" style="height:40px">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container bg-dark mt-3 mb-1">
      <div class="row">
        <div class="col-lg-6 m-auto pb-5">
          <div class="card card-body text-center mt-5">
            <h1 class="heading display-5 pb-3">Kalkulator Kalori</h1>
            <form id="calorie-form">
              <div class="form-group row">
                <label for="age" class="col-sm-2 col-form-label">Umur</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="age" placeholder="Umur 15-80" />
                </div>
              </div>

              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                  <div class="col-sm-10" id="form-radio">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="male" name="customRadioInline1" class="custom-control-input" checked="checked" />
                      <label class="custom-control-label" for="male">Pria</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="female" name="customRadioInline1" class="custom-control-input" />
                      <label class="custom-control-label" for="female">Wanita</label>
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="form-group row mb-2">
                <label for="weight" class="col-sm-2 col-form-label">Berat badan</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="weight" placeholder="kg" />
                </div>
              </div>

              <div class="form-group row mb-2">
                <label for="height" class="col-sm-2 col-form-label">Tinggi badan</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="height" placeholder="cm" />
                </div>
              </div>

              <div class="form-group row mt-2">
                <legend class="col-form-label col-sm-2 pt-0">Aktivitas</legend>
                <select class="custom-select col-sm-10" id="list">
                  <option selected value="1">Tidak aktif (jarang atau tidak pernah berolahraga)</option>
                  <option value="2">Sedikit aktif (Berolahraga 1-3 kali/minggu)</option>
                  <option value="3">Cukup aktif (Berolahraga 3-5 kali/minggu)</option>
                  <option value="4">Sangat aktif (Berolahraga 6-7 kali/minggu)</option>
                  <option value="5">Ekstra aktif (Berolahraga berat lebih dari 1 kali/hari)</option>
                </select>
              </div>

              <div class="form-group my-2">
                <input type="submit" value="Hitung kalori" class="btn btn-dark btn-block" />
              </div>
            </form>

            <div id="loading">
              <img src="./img/Loading.gif" alt="" />
            </div>

            <div id="results" class="pt-4">
              <h5>Total Calories</h5>
              <div class="form-group">
                <div class="input-group">
                  <input type="number" class="form-control" id="total-calories" disabled />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="app.js"></script>
  </body>
</html>
