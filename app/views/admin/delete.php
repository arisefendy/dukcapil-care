<?php
include '../../config/database.php';
include '../../core/utils/alerts.php';
include '../../core/models/petugasModel.php';
include '../../core/models/pendudukModel.php';

// Fungsi menangani penghapusan
function deleteHandler($conn, $type, $nik)
{
    if ($type === 'petugas') {
        $result = deletePetugasByNik($conn, $nik);
        $redirectUrl = '?url=data-petugas';
        $successMessage = 'Petugas telah berhasil dihapus.';
        $errorMessage = 'Gagal menghapus petugas, silahkan coba lagi!';
    } elseif ($type === 'penduduk') {
        $result = deletePenduduk($conn, $nik);
        $redirectUrl = '?url=data-penduduk';
        $successMessage = 'Penduduk telah berhasil dihapus.';
        $errorMessage = 'Gagal menghapus penduduk, silahkan coba lagi!';
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
    $nik = $_GET['id'];

    switch ($url) {
        case 'hapus-petugas':
            deleteHandler($conn, 'petugas', $nik);
            break;
        case 'hapus-penduduk':
            deleteHandler($conn, 'penduduk', $nik);
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