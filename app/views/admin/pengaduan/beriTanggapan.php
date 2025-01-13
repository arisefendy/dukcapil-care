<?php
include "../../core/utils/session.php";
include "../../core/models/pengaduanModel.php";
include "../../config/database.php";

// Mendapatkan role dari URL
$id = $_GET['id'];
$nik = $_SESSION['nik'];

if (empty($id)) {
    header('Location: index.php');
    exit;
}

// Mendapat data Pengaduan
$data = getPengaduanById($conn, $id);

// Proses beri tanggapan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggapan = $_POST['tanggapan'];
    $idPengaduan = $_GET['id'];
    $filePath = '';

    // Proses upload file jika ada
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "../../../public/assets/uploads/tanggapan/";
        $fileName = time() . "_" . basename($_FILES['file']['name']);
        $targetFile = $uploadDir . $fileName;

        // Validasi tipe file
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                $filePath = $fileName;
            } else {
                $errorMessage = "Gagal mengunggah file.";
            }
        } else {
            $errorMessage = "Tipe file tidak didukung.";
        }
    }

    // Insert data tanggapan
    if (!isset($errorMessage)) {
        $inputData = [
            'tanggapan' => $tanggapan,
            'file' => $filePath,
            'idPengaduan' => $id,
            'nikPetugas' => $nik,
        ];

        $result = addTanggapan($conn, $inputData);
        if ($result) {
            $changeStatus = changePengaduanStatus($conn, $id);
            if ($changeStatus) {
                $redirectUrl = '?url=pengaduan-selesai';
                showAlert('success', 'Berhasil memberikan tanggapan.', '', $redirectUrl);
            } else {
                $redirectUrl = '?url=pengaduan-masuk';
                showAlert('error', 'Gagal merubah status pengaduan.', '', $redirectUrl);
            }
        } else {
            $redirectUrl = '?url=pengaduan-masuk';
            showAlert('error', 'Gagal memberikan tanggapan.', '', $redirectUrl);
        }
    }
}

?>

<div class="card shadow">
    <?php include "../templates/cardHeader.php" ?>

    <div class="card-body p-4">

        <!-- Form untuk Beri Tanggapan -->
        <form action="" class="d-flex flex-column gap-3" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nik" class="mb-1">NIK</label>
                <input type="text" class="form-control" placeholder="<?= htmlspecialchars($data['nik_penduduk']) ?>" readonly></input>
            </div>

            <div class="form-group">
                <label for="nama" class="mb-1">Nama</label>
                <input type="text" class="form-control" placeholder="<?= htmlspecialchars($data['nama']) ?>" readonly></input>
            </div>

            <div class="form-group">
                <label for="kategori" class="mb-1">Kategori Pengaduan</label>
                <input class="form-control" placeholder="<?= htmlspecialchars($data['nama_kategori']) ?>" readonly></input>
            </div>

            <div class="form-group">
                <label for="pesan" class="mb-1">Isi Pengaduan</label>
                <textarea class="form-control" placeholder="<?= htmlspecialchars($data['pesan']) ?>" readonly></textarea>
            </div>

            <div class="form-group">
                <label for="foto" class="mb-1">Foto (Opsional)</label>
                <?php if (!empty($data['file'])): ?>
                    <!-- Jika foto tersedia, tampilkan -->
                    <div class="mb-3 py-2">
                        <img src="../../../public/assets/uploads/pengaduan/<?= htmlspecialchars($data['file'], ENT_QUOTES, 'UTF-8') ?>" alt="Foto Bukti" class="img-fluid rounded shadow-sm" style="max-height: 200px;">
                    </div>
                <?php else: ?>
                    <!-- Jika foto tidak tersedia, tampilkan placeholder -->
                    <p class="text-muted">Tidak ada foto yang diunggah.</p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="tanggapan" class="mb-1">Tanggapan</label>
                <textarea class="form-control" id="tanggapan" name="tanggapan" rows="3" placeholder="Beri tanggapan disini..." required></textarea>
            </div>

            <div class="form-group">
                <label for="file" class="mb-1">Lampiran (gambar atau PDF)</label>
                <input type="file" class="form-control" name="file" accept=".jpg,.jpeg,.png,.gif,.pdf">
                <?php if (isset($errorMessage)): ?>
                    <div class="text-danger mt-2"><?= $errorMessage ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                <a href='?url=pengaduan-masuk' class='btn btn-secondary'>
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="ms-2">Kembali</span>
                </a>
            </div>
        </form>

    </div>
</div>