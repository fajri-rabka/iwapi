<?php
  include "../libs/koneksi.php";
  
  if(isset($_POST['nm_user'])){
    $nm_user = $_POST['nm_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = 2;

      // Insert
      $select_user = " SELECT * FROM tbl_user WHERE email = '".$email."' and is_delete < 1 ";
      $query_user = mysqli_query($conn, $select_user);
      $jum_user = mysqli_num_rows($query_user);

      if($jum_user > 0){
        $valid = 2;
        header("location:register.php");
      }else{
        $password = md5($password);
        $insert = "
            INSERT INTO tbl_user(
                nm_user,
                email,
                password,
                level
            ) VALUES(
                '".$nm_user."',
                '".$email."',
                '".$password."',
                '".$level."'
            )
        ";
        $query = mysqli_query($conn,$insert);
        if(!$query){
            $valid = 0;
        }

        header("location:index.php");
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>IWAPI Pengadaan</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/icons/brands/icon-shop.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <h4 class="mb-2">Selamat datang di IWAPI</h4>
              <p class="mb-4">Silahkan daftarkan akun kamu di IWAPI</p>

              <form id="formAuthentication" class="mb-3" action="" method="POST">
                <div class="mb-3">
                  <label for="text" class="form-label">Nama User</label>
                  <input required
                    type="text"
                    class="form-control"
                    id="nm_user"
                    name="nm_user"
                    placeholder="Masukan nama kamu disini"
                    autofocus
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email </label>
                  <input required
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Masukan email kamu disini"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input required
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="Masukan password kamu disini"
                      aria-describedby="password"
                    />
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Register</button>
                </div>
              </form>

              <p class="text-center">
                <span>Sudah punya akun?</span>
                <a href="index.php">
                  <span>Masuk akun anda</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

  </body>
</html>
