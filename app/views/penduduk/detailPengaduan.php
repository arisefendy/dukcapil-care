<?php
include "../../core/utils/session.php";
include "../../core/models/pengaduanModel.php";
include "../../config/database.php";

$id = $_GET['id'];

if (empty($id)) {
    header('Location: index.php');
}

$data = getPengaduanById($conn, $id);

?>

<div class="card shadow">
    <?php include "../templates/cardHeader.php"; ?>

    <div class="card-body p-4">
        <form class="d-flex flex-column gap-3">

            <div class="form-group flex-column">
                <label for="kategoriPengaduan" class="mb-1">Kategori Pengaduan</label>
                <input type="text" class="form-control" value="<?= $data['nama_kategori'] ?>" readonly>
            </div>

            <div class="form-group">
                <label for="pesan" class="mb-1">Isi Laporan</label>
                <textarea class="form-control" placeholder="<?= $data['pesan'] ?>" readonly></textarea>
            </div>

            <div class="form-group">
                <label for="status" class="mb-1">Status</label>
                <p class="badge bg-<?= $data['status'] === 'Selesai' ? 'success' : 'warning' ?>">
                    <?= htmlspecialchars($data['status'], ENT_QUOTES, 'UTF-8') ?>
                </p>
            </div>

            <div class="form-group">
                <label for="foto" class="mb-1">Foto (Opsional)</label>
                <?php if (!empty($data['file'])): ?>
                    <!-- Jika foto tersedia, tampilkan -->
                    <div class="mb-3 py-2">
                        <img src="../../../public/assets/uploads/<?= htmlspecialchars($data['file'], ENT_QUOTES, 'UTF-8') ?>" alt="Foto Bukti" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                    </div>
                <?php else: ?>
                    <!-- Jika foto tidak tersedia, tampilkan placeholder -->
                    <p class="text-muted">Tidak ada foto yang diunggah.</p>
                <?php endif; ?>
            </div>
        </form>

        <a href="?url=riwayat-pengaduan" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i>
            <span class="ms-2">Kembali</span>
        </a>
    </div>
</div>