
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
                    <form>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama User</label>
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="Nama user"/>
                    </div>
                    <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Email</label>
                        <div class="input-group input-group-merge">
                            <input
                              type="text"
                              id="email"
                              class="form-control"
                              placeholder="Email"
                            />
                            <span class="input-group-text" id="email">@example.com</span>
                          </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Password</label>
                        <input type="password" class="form-control" id="basic-default-fullname" placeholder="Password" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Level</label>
                        <div class="input-group">
                            <select class="form-select" id="inputGroupSelect01">
                              <option selected>Pilih level</option>
                              <option value="1">Admin</option>
                              <option value="2">User</option>
                            </select>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
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