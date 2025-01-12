<?php
include "../../core/utils/session.php";
include "../../config/database.php";
include "../../core/models/pengaduanModel.php";
include "../../core/utils/alerts.php";

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
            $redirectUrl = '../../views/penduduk/tulisPengaduan.php';
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
        $redirectUrl = '../../views/penduduk/index.php';
        showAlert('success', 'Pengaduan berhasil diajukan!', '', $redirectUrl);
    } else {
        $redirectUrl = '../../views/penduduk/tulisPengaduan.php';
        showAlert('error', 'Gagal membuat pengaduan!', '', $redirectUrl);
    }
}
