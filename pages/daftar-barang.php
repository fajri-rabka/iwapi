<?php
  session_start();
  include "../libs/koneksi.php";

  if(!isset($_SESSION['email'])) { header('Location:login.php');  }

  if(isset($_GET['pesan'])){
    $id_brng = $_GET['id_brng'];
    $pcs = $_GET['pcs'];
    
    if($pcs > 0){
      
      $query = mysqli_query($conn, "SELECT * FROM tbl_keranjang where id_brng = '".$id_brng."' and id_user = '".$_SESSION['id_user']."' and no_order = '' and is_delete < 1 order by id asc");
      $jml = mysqli_num_rows($query);
      
      if($jml > 0){
        $update = " UPDATE tbl_keranjang SET pcs = pcs+'".$pcs."' WHERE id_brng = '".$id_brng."' and id_user = '".$_SESSION['id_user']."' and no_order = '' and is_delete < 1 ";
        $query = mysqli_query($conn,$update);
      }else{
        $insert = "
            INSERT INTO tbl_keranjang(
                id_brng,
                pcs,
                id_user
            ) VALUES(
                '".$id_brng."',
                '".$pcs."',
                '".$_SESSION['id_user']."'
            )
        ";
        $query = mysqli_query($conn,$insert);
      }

      header("location:daftar-barang.php?add");
    }else{
      header("location:daftar-barang.php");
    }
  }

  $show = '';
  if(isset($_GET['add'])){
    $show = 'show';
  }
  
  $fillter = '';
  if(isset($_GET['search_brng'])){
    $fillter = " and nm_brng like '%".$_GET['search_brng']."%' ";
  }

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Without menu - Layouts | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/icons/brands/icon-shop.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

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
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
      <!-- Layout container -->
      <div class="layout-page">
        <?php include "part/header-user.php"; ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-5">
              <h5 class="fw-bold pb-0">Daftar Barang</h5>
              <p class="mb-4 text-muted">Cari barang sesuai kebutuhan bisnis anda</p>

              <?php
                $query = mysqli_query($conn, "SELECT * FROM tbl_barang where is_delete < 1 ".$fillter." order by id asc");
                while($row = mysqli_fetch_array($query)){
                  $gambar = $row['gambar'];
                  if($gambar == ''){
                    $gambar = '../assets/img/barang/A_black_image.jpg';
                  }

                  echo'
                    <div class="col-6">
                      <div class="card mb-3">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img class="card-img card-img-left" src="'.$gambar.'" alt="Card image" />
                          </div>
                          <div class="col-md-8 d-flex align-items-center">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-6">
                                  <h5 class="card-title">'.$row['nm_brng'].'</h5>
                                </div>
                                <div class="col-6">
                                  <h4 class="card-title">Rp. '.number_format($row['harga']).'</h4>
                                </div>
                              </div>
                              <p class="card-text">
                                <div class="row align-items-end">
                                  <div class="col-5">
                                    <h6 class="mb-1 text-muted">Jumlah</h6>
                                    <div class="input-group input-group-merge">
                                      <span class="input-group-text"></span>
                                      <input type="number" class="form-control" placeholder="20" value="" id="pcs'.$row['id'].'" aria-label="Amount (to the nearest dollar)" />
                                      <span class="input-group-text">Pcs</span>
                                    </div>
                                  </div>
                                  <div class="col-7">
                                    <a href="#" class="btn btn-outline-primary addBrng"
                                      data-id_brng="'.$row['id'].'"
                                    >
                                      + Tambah Keranjang
                                    </a>
                                  </div>
                                </div>
                                <div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  ';
                }

              ?>

            </div>


            <div class="toast-container">
              <div class="bs-toast toast <?= $show ?>" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                  <i class="bx bx-bell me-2"></i>
                  <div class="me-auto fw-semibold">Info</div>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                  Barang berhasil ditambahkan ke keranjang
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / Content -->


        <form action="" method="GET">
          <input type="hidden" class="form-control id_brng" name="id_brng">
          <input type="hidden" class="form-control pcs" name="pcs">
          <input type="submit" class="btn btn-outline-secondary pesan" name="pesan" value="Finish" style="display:none;">
        </form>



        <?php include "part/footer-user.php"; ?>

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
              ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              IWAPI All Rights Reserved.
            </div>
          </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>
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

  <!-- Script -->
  <script type="text/javascript">
    $(document).on( "click", '.addBrng',function(e) {
        var id_brng = $(this).data('id_brng');
        var pcs = $("#pcs"+id_brng).val();
        if(pcs == ''){ pcs = 0; }

        $(".id_brng").val(id_brng);
        $(".pcs").val(pcs);

        $(".pesan").click();
    });
  </script>

</body>

</html>