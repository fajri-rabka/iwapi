<?php
  session_start();
  include "../libs/koneksi.php";

  if(!isset($_SESSION['email'])) { header('Location:login-admin.php');  }

  $show = '';
  $text = '';
  if(isset($_POST['finish'])){
    $id_brng = $_POST['id_brng'];
    $kode_brng = $_POST['kode_brng'];
    $nm_brng = $_POST['nm_brng'];
    $jenis_brng = $_POST['jenis_brng'];
    $harga = $_POST['harga'];

    $gambar = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name']; 

    $is_gambar = '';
    if($gambar!="") {
        move_uploaded_file($file_tmp, '../assets/img/barang/'.$gambar);
        $path="../assets/img/barang/".$gambar;

        $is_gambar = " gambar = '".$path."', ";
    }else{
        $path="";
    }

    if($id_brng < 1){
      // Insert
      $select_brng = " SELECT * FROM tbl_barang WHERE kode_brng = '".$kode_brng."' and is_delete < 1 ";
      $query_brng = mysqli_query($conn, $select_brng);
      $jum_brng = mysqli_num_rows($query_brng);

      if($jum_brng > 0){
        $valid = 2;
        header("location:form-barang.php");
      }else{
        $insert = "
            INSERT INTO tbl_barang(
                kode_brng,
                nm_brng,
                jenis_brng,
                harga,
                gambar
            ) VALUES(
                '".$kode_brng."',
                '".$nm_brng."',
                '".$jenis_brng."',
                '".$harga."',
                '".$path."'
            )
        ";
        $query = mysqli_query($conn,$insert);
        if(!$query){
            $valid = 0;
        }

        header("location:master-barang.php?add");
      }

    }else{
      // Update
        $update = " UPDATE tbl_barang SET 
                                      kode_brng = '".$kode_brng."',
                                      nm_brng = '".$nm_brng."',
                                      jenis_brng = '".$jenis_brng."',
                                      ".$is_gambar."
                                      harga = '".$harga."' 
                                    WHERE id = '".$id_brng."' ";
    
        $query = mysqli_query($conn,$update);
        if(!$query){
            $valid = 0;
        }

        header("location:master-barang.php?update");
    }

  }

  $id = 0;
  $kode_brng = rand();
  $nm_brng = '';
  $jenis_brng = '';
  $harga = '';
  if(isset($_GET['id'])){
    $query = mysqli_query($conn, "SELECT * FROM tbl_barang where id = '".$_GET['id']."' and is_delete < 1 order by id asc");
    while($row = mysqli_fetch_array($query)){
      $id = $row['id'];
      $kode_brng = $row['kode_brng'];
      $nm_brng = $row['nm_brng'];
      $jenis_brng = $row['jenis_brng'];
      $harga = round($row['harga']);
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
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id_brng" value="<?= $id ?>">
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Kode Barang</label>
                        <input type="text" name="kode_brng" value="<?= $kode_brng ?>" class="form-control" id="basic-default-fullname" placeholder="Kode barang" readonly/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Barang</label>
                        <input type="text" name="nm_brng" value="<?= $nm_brng ?>" class="form-control" id="basic-default-fullname" placeholder="Nama barang" required/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jenis Barang</label>
                        <input type="text" name="jenis_brng" value="<?= $jenis_brng ?>" class="form-control" id="basic-default-fullname" placeholder="Jenis barang" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Harga Barang</label>
                        <input type="number" name="harga" value="<?= $harga ?>" class="form-control" id="basic-default-fullname" placeholder="Harga barang" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="basic-default-fullname"  />
                      </div>
                      <button type="submit" name="finish" class="btn btn-primary">Simpan</button>
                      <a href="master-barang.php" class="btn btn-outline-primary me-3">Batal</a>
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