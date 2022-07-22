<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="dashboard.php" class="app-brand-link">
            <!-- <span class="app-brand-logo demo">
                <img src="../assets/img/icons/brands/icon-shop.png" alt="Brand-Logo">
            </span> -->
            <span class="app-brand-text demo menu-text fw-bolder ms-2">PT Raihan Anugrah Pratama</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Layouts">Master Data</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="./master-transaksi.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-wallet"></i>
                        <div data-i18n="Without menu">Transaksi</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="./master-barang.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-package"></i>
                        <div data-i18n="Without navbar">Data Barang</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="./master-user.php" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                        <div data-i18n="Without navbar">Data User</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link"
            data-bs-toggle="modal"
            data-bs-target="#modalLogout"
            >
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Analytics">Logout</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->