<?php
include "../../core/utils/session.php";
include "../../core/models/pengaduanModel.php";
include "../../config/database.php";

$id = $_GET['id'];

if (empty($id)) {
    header('Location: index.php');
}

// $data = getPengaduanById($conn, $id);
$sql = "SELECT * FROM tb_pengaduan, tb_tanggapan WHERE tb_tanggapan.id_pengaduan='$id' AND tb_pengaduan.id_pengaduan='$id'";

$result = mysqli_query($conn, $sql);

?>

<div class="card shadow">
    <?php include "../templates/cardHeader.php" ?>

    <div class="card-body p-4">
        <?php
        if (mysqli_num_rows($result) == 0) {
            echo "<div class='alert alert-danger'>Maaf, Pengaduan anda belum ditanggapi.</div>";
        } else {
            $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

        ?>
            <form class="d-flex flex-column gap-3 p-3">
                <h4 class="text-center mb-2">Lihat Tanggapan</h4>

                <div class="form-group">
                    <label for="pesan" class="mb-1">Isi Laporan</label>
                    <textarea class="form-control" placeholder="<?= $data['pesan'] ?>" readonly></textarea>
                </div>

                <div class="form-group">
                    <label for="pesan" class="mb-1">Tanggapan</label>
                    <textarea class="form-control" placeholder="<?= $data['tanggapan'] ?>" readonly></textarea>
                </div>

                <div class="form-group">
                    <label for="foto" class="mb-1">Lampiran</label>
                    <?php if (!empty($data['file'])): ?>
                        <?php
                        // Ambil ekstensi file
                        $fileExtension = pathinfo($data['file'], PATHINFO_EXTENSION);
                        $filePath = "../../../public/assets/uploads/" . htmlspecialchars($data['file'], ENT_QUOTES, 'UTF-8');
                        ?>

                        <div class="mb-3 py-2">
                            <?php if (in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                <!-- Jika file adalah gambar -->
                                <img src="<?= $filePath ?>" alt="Lampiran" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                            <?php elseif (strtolower($fileExtension) === 'pdf'): ?>
                                <!-- Jika file adalah PDF -->
                                <embed src="<?= $filePath ?>" type="application/pdf" width="100%" height="400px" class="rounded shadow-sm">
                                <p><a href="<?= $filePath ?>" target="_blank" class="btn btn-outline-primary btn-sm">Unduh PDF</a></p>
                            <?php else: ?>
                                <!-- Jika file bukan gambar atau PDF -->
                                <p class="text-muted">File tidak dapat ditampilkan. Anda dapat mengunduhnya dengan tombol di bawah ini.</p>
                                <p><a href="<?= $filePath ?>" target="_blank" class="btn btn-outline-primary btn-sm">Unduh Lampiran</a></p>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <!-- Jika file tidak tersedia -->
                        <p class="text-muted">Tidak ada lampiran yang diunggah.</p>
                    <?php endif; ?>
                </div>
            </form>
        <?php } ?>

        <a href="?url=riwayat-pengaduan" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i>
            <span class="ms-2">Kembali</span>
        </a>

    </div>
</div>