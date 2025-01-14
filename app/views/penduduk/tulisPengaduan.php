<?php
include "../../core/utils/session.php";
include "../../core/models/pengaduanModel.php";
include "../../config/database.php";
include "../../core/utils/alerts.php";

// Mengambil data kategori pengaduan
$kategoriPengaduan = getAllKategoriPengaduan($conn);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesan = mysqli_escape_string($conn, $_POST['pesan']);
    $kategori = mysqli_escape_string($conn, $_POST['kategori']);
    $status = 'proses';
    $nik = $_SESSION['nik'];

    // Proses upload foto
    $file = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $targetDir = "../../../public/assets/uploads/pengaduan/";
        $fileName = time() . "_" . basename($_FILES['foto']['name']);
        $targetFilePath = $targetDir . $fileName;

        // Cek file yang diupload
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFilePath)) {
            $file = $fileName;
        } else {
            $redirectUrl = '?url=tulis-pengaduan';
            showAlert('error', 'Gagal mengupload foto!', 'Pastikan file yang diupload memiliki berupa foto/gambar', $redirectUrl);
        }
    }

    $data = [
        'pesan' => $pesan,
        'file' => $file,
        'status' => $status,
        'nik' => $nik,
        'kategori' => $kategori,
    ];

    $result = addPengaduan($conn, $data);
    if ($result) {
        $redirectUrl = '?url-riwayat-pengaduan';
        showAlert('success', 'Pengaduan berhasil diajukan!', '', $redirectUrl);
    } else {
        $redirectUrl = '?url=tulis-pengaduan';
        showAlert('error', 'Gagal membuat pengaduan!', '', $redirectUrl);
    }
}

?>

<div class="card shadow">
    <?php include "../templates/cardHeader.php"; ?>

    <div class="card-body p-4">

        <form action="" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3">

            <div class="form-group flex-column">
                <label for="kategoriPengaduan" class="mb-1">Kategori Pengaduan</label>
                <select class="form-control" id="kategoriPengaduan" name="kategori" required>
                    <option value="" disabled selected>Pilih kategori</option>

                    <?php
                    foreach ($kategoriPengaduan as $kategori) {
                        echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['nama_kategori'] . "</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="pesan" class="mb-1">Isi Laporan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Silahkan menyampaikan pertanyaan, keluhan, saran, masukan dan kritik anda disini. Dimohon untuk menyertakan: NIK, No KK, Nama Lengkap, dan Pertanyaan anda secara rinci." required></textarea>
            </div>

            <div class="form-group">
                <label for="foto" class="mb-1">Foto (Opsional)</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/">
            </div>

            <div class="form-group d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-arrow-up"></i>
                    <span class="ms-2">Ajukan</span></button>
                <a href="index.php" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span class="ms-2">Kembali</span>
                </a>
            </div>

        </form>

    </div>
</div>