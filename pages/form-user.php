<?php
  session_start();
  include "../libs/koneksi.php";
  
  if(!isset($_SESSION['email'])) { header('Location:login-admin.php');  }

  $show = '';
  $text = '';
  if(isset($_POST['finish'])){
    $is_pass='';
    $nm_user = $_POST['nm_user'];
    $email = $_POST['email']; 
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $id_user = $_POST['id_user'];

    if($id_user < 1){
      // Insert
      $select_user = " SELECT * FROM tbl_user WHERE email = '".$email."' and is_delete < 1 ";
      $query_user = mysqli_query($conn, $select_user);
      $jum_user = mysqli_num_rows($query_user);

      if($jum_user > 0){
        $valid = 2;
        header("location:form-user.php");
      }else{
        $password = md5($password);
        $insert = "
            INSERT INTO tbl_user(
                nm_user,
                email,
                alamat,
                password,
                level
            ) VALUES(
                '".$nm_user."',
                '".$email."',
                '".$alamat."',
                '".$password."',
                '".$level."'
            )
        ";
        $query = mysqli_query($conn,$insert);
        if(!$query){
            $valid = 0;
        }

        header("location:master-user.php?add");
      }

    }else{
      // Update
      $select_user = " SELECT * FROM tbl_user WHERE email = '".$email."' and id <> '".$id_user."' and is_delete < 1 ";
      $query_user = mysqli_query($conn, $select_user);
      $jum_user = mysqli_num_rows($query_user);

      if($jum_user > 0){
        $valid = 2;
        header("location:form-user.php?id=".$id_user);
      }else{
        if($password != ''){
          $is_pass = "password = '".md5($password)."',";
        }
        $update = " UPDATE tbl_user SET 
                                      nm_user = '".$nm_user."',
                                      email = '".$email."',
                                      alamat = '".$alamat."',
                                      ".$is_pass."
                                      level = '".$level."' 
                                    WHERE id = '".$id_user."' ";
    
        $query = mysqli_query($conn,$update);
        if(!$query){
            $valid = 0;
        }

        header("location:master-user.php?update");
      }
    }

  }

  $id = 0;
  $nm_user = '';
  $email = '';
  $password = '';
  $alamat = '';
  $level = '';
  if(isset($_GET['id'])){
    $query = mysqli_query($conn, "SELECT * FROM tbl_user where id = '".$_GET['id']."' and is_delete < 1 order by id asc");
    while($row = mysqli_fetch_array($query)){
      $id = $row['id'];
      $nm_user = $row['nm_user'];
      $email = $row['email'];
      $alamat = $row['alamat'];
      $password = $row['password'];
      $level = $row['level'];
    }
  }
?>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>PT Raihan Anugrah Pratama Pengadaan</title>

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

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include "part/header-admin.php"; ?>

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Bootstrap Table -->
              
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-body">
                    <form action="" method="POST">
                      <input type="hidden" value="<?= $id ?>" name="id_user">
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama User</label>
                        <input type="text" value="<?= $nm_user ?>" name="nm_user" required class="form-control" id="basic-default-fullname" placeholder="Nama user"/>
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                        <div class="input-group input-group-merge">
                            <input type="text" value="<?= $email ?>" name="email" required id="email" class="form-control" placeholder="Email"/>
                            <span class="input-group-text" id="email">@example.com</span>
                          </div>
                      </div>
                      <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Alamat</label>
                        <div class="input-group input-group-merge">
                            <input type="text" value="<?= $alamat ?>" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required/>
                          </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Password</label>
                        <input type="password" name="password" <?php if($id < 1){echo'required';} ?> class="form-control" id="basic-default-fullname" placeholder="Password" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Level</label>
                        <div class="input-group">
                            <select class="form-select" name="level" required id="inputGroupSelect01">
                              <option value="">Pilih level</option>
                              <option value="1" <?php if($level == 1){echo'selected';} ?> >Admin</option>
                              <option value="2" <?php if($level == 2){echo'selected';} ?> >User</option>
                            </select>
                          </div>
                      </div>
                      <button type="submit" name="finish" class="btn btn-primary">Simpan</button>
                      <a href="master-user.php" class="btn btn-outline-primary me-3">Batal</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
              <!--/ Basic Bootstrap Table -->
            </div>
            <!-- / Content -->

            <?php include "part/footer-admin.php"; ?>

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


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

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>