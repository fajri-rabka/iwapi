<?php
  session_start();
  include "../libs/koneksi.php";

  if(!isset($_SESSION['email'])) { header('Location:login-admin.php');  }
  
  if(isset($_GET['setuju'])){
    $setuju = " UPDATE tbl_transaksi SET sts = 'DISETUJUI' WHERE no_order = '".$_GET['id_hapus']."' ";
    $query = mysqli_query($conn,$setuju);

    header("location:master-transaksi.php?setuju");
  }
  if(isset($_GET['tolak'])){
    $tolak = " UPDATE tbl_transaksi SET sts = 'DITOLAK' WHERE no_order = '".$_GET['id_hapus']."' ";
    $query = mysqli_query($conn,$tolak);

    header("location:master-transaksi.php?tolak");
  }

  $show = '';
  $text = '';

  $no_order = '';
  if(isset($_GET['no_order'])){
    $no_order = $_GET['no_order'];
  }
  
?>

<!DOCTYPE html>

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

    <style>
      @media print{
        .hide-print{
          display: none !important
        }
      }
    </style>
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
              <div class="card">
                <div class="card-body cart-container">
                    <h6 class="text-muted">
                      Nomor Order #<?= $no_order ?>
                      <a href="javascript:void" onclick="window.print();" class="btn btn-primary ml-2 hide-print">
                        <span class="tf-icons bx bx-printer"></span>
                      </a>
                    </h6>

                    <?php 
                      $total=0;
                      $query = mysqli_query($conn, "SELECT k.*, b.gambar, b.nm_brng FROM tbl_keranjang k join tbl_barang b on b.id = k.id_brng where k.is_delete < 1 and k.no_order = '".$no_order."' order by k.id asc");
                      while($row = mysqli_fetch_array($query)){
                        $gambar = $row['gambar'];
                        if($gambar == ''){
                          $gambar = '../assets/img/barang/A_black_image.jpg';
                        }
                        $harga = $row['harga'] * $row['pcs'];
                        $total += $harga;
                        
                        echo'
                          <ul class="p-0 m-0 cart-body">
                            <li class="d-flex mb-4 pb-1">
                              <div class="avatar flex-shrink-0 me-3">
                                  <img class="card-img card-img-left" src="'.$gambar.'" alt="Card image" />
                              </div>
                              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                  <small class="text-muted d-block mb-1">'.$row['nm_brng'].'</small>
                                  <h6 class="mb-1">'.number_format($row['pcs']).' pcs</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                  <h6 class="mb-0">Rp. '.number_format($harga).'</h6>
                                </div>
                              </div>
                            </li>
                          </ul>
                        ';
                      }
                    ?>

                    <ul class="p-0 m-0 cart-body">
                      <li class="d-flex mb-4 pb-1">
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                          <div class="me-2">
                            <small class="text-muted d-block mb-1">Total</small>
                            <h6 class="mb-1">Jumlah Harga</h6>
                          </div>
                          <div class="user-progress d-flex align-items-center gap-1">
                            <h6 class="mb-0">Rp. <?= number_format($total) ?></h6>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="d-flex align-items-center hide-print">
                        <a href="#" class="btn btn-primary mt-3 me-3 setuju_button" type="button" 
                          data-bs-toggle="modal" 
                          data-bs-target="#modalSetuju" 
                          data-id_hapus="<?php echo $no_order ?>"
                        >
                          <span class="tf-icons bx bx-hand"></span>
                          Setujui Permintaan
                        </a>
                        <a href="#" class="btn btn-outline-primary mt-3 me-3 tolak_button" type="button" 
                          data-bs-toggle="modal" 
                          data-bs-target="#modalTolak" 
                          data-id_hapus="<?php echo $no_order ?>"
                        >
                          <span class="tf-icons bx bx-hand"></span>
                          Tolak Permintaan
                        </a>
                        <a class="ml-3 mt-3 " href="master-transaksi.php">
                          <u>
                              Kembali ke transaksi
                          </u>
                        </a>
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

    <!-- Script -->
    <script type="text/javascript">
      $(document).on( "click", '.tolak_button',function(e) {
          var id_hapus = $(this).data('id_hapus');
          $(".id_hapus").val(id_hapus);
      });
      $(document).on( "click", '.setuju_button',function(e) {
          var id_hapus = $(this).data('id_hapus');
          $(".id_hapus").val(id_hapus);
      });
    </script>

  </body>
</html>