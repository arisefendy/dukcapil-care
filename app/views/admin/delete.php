<?php
include '../../config/database.php';
include_once '../../core/utils/alerts.php';
include '../../core/models/petugasModel.php';
include '../../core/models/pendudukModel.php';
include '../../core/models/pengaduanModel.php';

// Fungsi menangani penghapusan
function deleteHandler($conn, $type, $id)
{
    if ($type === 'petugas') {
        $result = deletePetugasByNik($conn, $id);
        $redirectUrl = '?url=data-petugas';
        $successMessage = 'Petugas telah berhasil dihapus.';
        $errorMessage = 'Gagal menghapus petugas, silahkan coba lagi!';
    } elseif ($type === 'penduduk') {
        $result = deletePenduduk($conn, $id);
        $redirectUrl = '?url=data-penduduk';
        $successMessage = 'Penduduk telah berhasil dihapus.';
        $errorMessage = 'Gagal menghapus penduduk, silahkan coba lagi!';
    } elseif ($type === 'pengaduan') {
        $result = deletePengaduan($conn, $id);
        $redirectUrl = "?url=pengaduan-masuk";
        $successMessage = 'Pengaduan telah berhasil dihapus.';
        $errorMessage = 'Gagal menghapus pengaduan, silahkan coba lagi!';
    }

    // Menampilkan alert setelah penghapusan
    if ($result) {
        showAlert('success', 'Berhasil', $successMessage, $redirectUrl);
    } else {
        showAlert('error', 'Gagal', $errorMessage, $redirectUrl);
    }
}

// Cek URL untuk penanganan penghapusan
if (isset($_GET['url']) && isset($_GET['id'])) {
    $url = $_GET['url'];
    $id = $_GET['id'];

    switch ($url) {
        case 'hapus-petugas':
            deleteHandler($conn, 'petugas', $id);
            break;
        case 'hapus-penduduk':
            deleteHandler($conn, 'penduduk', $id);
            break;
        case 'hapus-pengaduan':
            deleteHandler($conn, 'pengaduan', $id);
            break;
        default:
            // Jika URL tidak dikenali
            showAlert('error', 'Invalid Request', 'URL tidak valid.', 'index.php');
            break;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include '../templates/metaHeader.php'; ?>

<body>

</body>

</html>