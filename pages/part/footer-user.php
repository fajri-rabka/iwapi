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
                    <a href="logout.php" class="btn btn-outline-secondary">
                        Ya, keluar akun
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batalkan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Info Ajuan -->
<div class="modal fade" id="modalsuccess" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">
                        <i class="bx bx-bell"></i>
                        Info
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Permintaan berhasil diajukan</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Ajukan -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Peringatan!</h5>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <input type="hidden" class="form-control id_hapus" name="id_hapus">
                        <p>Apakah anda yakin, menghapus keranjang ini?</p>
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
    
<!-- Modal Cancel Ajuan -->
<div class="modal fade" id="modalCancel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Peringatan!</h5>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <input type="hidden" class="form-control id_order" name="id_order">
                        <p>Apakah anda yakin, membatalkan pesanan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-secondary" name="cancel" value="Ya, saya yakin">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Modal Selesai Ajuan -->
<div class="modal fade" id="modalSelesai" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Peringatan!</h5>
                </div>
                <form action="" method="GET">
                    <div class="modal-body">
                        <input type="hidden" class="form-control id_order" name="id_order">
                        <p>Apakah anda yakin, telah selesai pesanan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-outline-secondary" name="selesai" value="Ya, saya yakin">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batalkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>