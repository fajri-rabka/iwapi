<!-- Modal Logout -->
<div class="modal fade" id="modalLogout" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Peringatan!</h5>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin, untuk keluar akun?</p>
                </div>
                <div class="modal-footer">
                    <a href="logout.php?admin=1" class="btn btn-outline-secondary">
                        Ya, keluar akun
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batalkan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast -->
<div class="toast-container" style="position: fixed; right: 20px; bottom: 20px;">
    <div class="bs-toast toast <?= $show ?>" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Sukses</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?= $text ?>
        </div>
    </div>
</div>

<!-- disetujui -->
<div class="modal fade" id="modalSetuju" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Peringatan!</h5>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <input type="hidden" class="form-control id_hapus" name="id_hapus">
                        <p>Apakah anda yakin, setujui pesanan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-secondary" name="setuju" value="Ya, saya yakin">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ditolak -->
<div class="modal fade" id="modalTolak" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Peringatan!</h5>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <input type="hidden" class="form-control id_hapus" name="id_hapus">
                        <p>Apakah anda yakin, tolak pesanan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-secondary" name="tolak" value="Ya, saya yakin">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>