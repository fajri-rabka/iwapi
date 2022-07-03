<?php
  session_start();
  include "../libs/koneksi.php";

  if(!isset($_SESSION['email'])) { header('Location:login-admin.php');  }

  if(isset($_GET['delete'])){
    $delete = " UPDATE tbl_user SET is_delete = '1' WHERE id = '".$_GET['id_hapus']."' ";
    $query = mysqli_query($conn,$delete);

    header("location:master-user.php?del");
  }

  $show = '';
  $text = '';
  if(isset($_GET['add'])){
    $show = 'show';
    $text = 'Permintaan berhasil ditambahkan';
  }
  if(isset($_GET['update'])){
    $show = 'show';
    $text = 'Permintaan berhasil diubah';
  }
  if(isset($_GET['del'])){
    $show = 'show';
    $text = 'Permintaan berhasil dihapus';
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
                <h5 class="card-header">
                  Master User
                  <a href="form-user.php" class="btn btn-primary me-3">
                    + Tambah User
                  </a>
                </h5>
                <div class="table text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        $no=1;
                        $query = mysqli_query($conn, "SELECT * FROM tbl_user where is_delete < 1 order by id asc");
                        while($row = mysqli_fetch_array($query)){
                          if($row['level'] == 1){
                            $level = 'Admin';
                            $bgColor='bg-label-success';
                          }else{
                            $level = 'User';
                            $bgColor='bg-label-warning';
                          }

                          echo'
                            <tr>
                              <td>'.$no++.'</td>
                              <td>'.$row['nm_user'].'</td>
                              <td>'.$row['email'].'</td>
                              <td>
                                <span class="badge '.$bgColor.' me-1">'.$level.'</span>
                              </td>
                              <td>
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="form-user.php?id='.$row['id'].'"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item hapus_button" href="javascript:void(0);" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalCenter"
                                    data-id_hapus="'.$row['id'].'"
                                  ><i class="bx bx-trash me-1"></i> Hapus</a>
                                </div>
                              </td>
                            </tr>

                          ';
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
              <?php include "part/footer-admin.php"; ?>
            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Peringatan!</h5>
              </div>
              <form action="" method="GET">
                <div class="modal-body">
                    <input type="hidden" class="form-control id_hapus" name="id_hapus">
                    <p>Apakah anda yakin, menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn btn-outline-secondary" name="delete" value="Ya, saya yakin">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batalkan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
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
      $(document).on( "click", '.hapus_button',function(e) {
          var id_hapus = $(this).data('id_hapus');
          $(".id_hapus").val(id_hapus);
      });
    </script>

  </body>
</html>