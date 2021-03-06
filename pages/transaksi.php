<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>IWAPI Pengadaan</title>

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
            <div class="row">

              <!-- Expense Overview -->
              <div class="col-12 order-1 mb-4">
                <div class="nav-align-top mb-4">
                  <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#running" aria-controls="running" aria-selected="true">
                        <i class="tf-icons bx bx-package"></i>
                        Berjalan
                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">2</span>
                      </button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#approved"
                        aria-controls="approved" aria-selected="false">
                        <i class="tf-icons bx bx-user-check"></i> Disetujui
                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">1</span>
                      </button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#cancel"
                        aria-controls="cancel" aria-selected="false">
                        <i class="tf-icons bx bx-user-x"></i> Ditolak
                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">1</span>
                      </button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#finished"
                        aria-controls="finished" aria-selected="false">
                        <i class="tf-icons bx bx-check"></i> Selesai
                        <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger">1</span>
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="running" role="tabpanel">
                      <div class="card-body cart-container">
                        <h6 class="text-muted">Nomor Order #56789121</h6>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Buku</small>
                                <h6 class="mb-1">1000 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 5.000.000</h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Pensil</small>
                                <h6 class="mb-1">300 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 3.000.000</h6>
                              </div>
                            </div>
                          </li>
                          <a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalCancel">
                            <span class="tf-icons bx bx-hand"></span>
                            Batalkan Permintaan
                          </a>
                        </ul>
                      </div>
                      <div class="card-body cart-container">
                        <h6 class="text-muted">Nomor Order #56789012</h6>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Buku</small>
                                <h6 class="mb-1">1000 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 5.000.000</h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Pensil</small>
                                <h6 class="mb-1">300 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 3.000.000</h6>
                              </div>
                            </div>
                          </li>
                          <a href="#" data-bs-toggle="modal" data-bs-target="#modalCancel" class="btn btn-primary mt-3">
                            <span class="tf-icons bx bx-hand"></span>
                            Batalkan Permintaan
                          </a>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="cancel" role="tabpanel">
                      <div class="card-body cart-container">
                        <h6 class="text-muted">Nomor Order #56789912</h6>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Buku</small>
                                <h6 class="mb-1">1000 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 5.000.000</h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="approved" role="tabpanel">
                      <div class="card-body cart-container">
                        <h6 class="text-muted">Nomor Order #56789012</h6>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Buku</small>
                                <h6 class="mb-1">1000 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 5.000.000</h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Pensil</small>
                                <h6 class="mb-1">300 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 3.000.000</h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="finished" role="tabpanel">
                      <div class="card-body cart-container">
                        <h6 class="text-muted">Nomor Order #56789012</h6>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Buku</small>
                                <h6 class="mb-1">1000 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 5.000.000</h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                        <ul class="p-0 m-0 cart-body">
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img class="card-img card-img-left" src="../assets/img/elements/library.jpg"
                                alt="Card image" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1">Pensil</small>
                                <h6 class="mb-1">300 pcs</h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">Rp. 3.000.000</h6>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php include "part/footer-user.php"; ?>
            <!-- / Content -->


            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ??
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
</body>

</html>