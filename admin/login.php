<?php
  session_start();
  require "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="author" content="Muhamad Nauval Azhar" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="This is a login page template based on Bootstrap 5" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  </head>

  <body>
    <section class="h-100">
      <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
          <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
            <div class="text-center my-5"></div>
            <div class="card shadow-lg">
              <div class="card-body p-5">
                <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                  <div class="mb-3">
                    <label class="mb-2 text-muted" for="Username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" value="" required autofocus />

                  </div>

                  <div class="mb-3">
                    <div class="mb-2 w-100">
                      <label class="text-muted" for="password">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" required />
                    <div class="invalid-feedback">Password is required</div>
                  </div>

                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary" style="background-color: green">Login</button>
                  </div>
                </form>
                <div>
                  <?php
                    if(isset($_POST['submit'])){
                      $username = $_POST['username'];
                      $password = MD5($_POST['password']);
                      
                      $query = mysqli_query($con, "SELECT * FROM db_admin WHERE username='$username' and password='$password'");
                      $data = mysqli_fetch_array($query);

                      if(mysqli_num_rows($query)>0){
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['login'] = true;
                        
                        header('location: dashboard.php');
                        
                        
                      }
                      else{
                        echo "false";
                        
                      }
                    }
                      
                    
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>