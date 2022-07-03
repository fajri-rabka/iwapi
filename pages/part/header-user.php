  <!-- Navbar -->

  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" >
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <form action="daftar-barang.php" method="GET">
                    <input type="text" class="form-control border-0 shadow-none" name="search_brng" placeholder="Cari Barang Disini..." aria-label="Search..." />
                  </form>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/user.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/user.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?= $_SESSION['nm_user'] ?></span>
                            <small class="text-muted">User</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="homepage.php">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-home me-2"></i>
                          <span class="flex-grow-1 align-middle">Beranda</span>
                          <!-- <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span> -->
                        </span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="keranjang.php">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-cart-alt me-2"></i>
                          <span class="flex-grow-1 align-middle">Keranjang</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">
                            <?php
                              $query_keranjang = mysqli_query($conn, "SELECT * FROM tbl_keranjang where is_delete < 1 and id_user = '".$_SESSION['id_user']."' and no_order = '' order by id asc");
                              $num_keranjang = mysqli_num_rows($query_keranjang);
                              echo $num_keranjang;
                            ?>
                          </span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="transaksi.php">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Transaksi</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">
                            <?php
                              $query_transaksi = mysqli_query($conn, "SELECT * FROM tbl_transaksi where is_delete < 1 order by id asc");
                              $num_transaksi = mysqli_num_rows($query_transaksi);
                              echo $num_transaksi;
                            ?>
                          </span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" 
                      data-bs-toggle="modal"
                      data-bs-target="#modalLogout"
                      href="javascript:void;">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->