<?php
include "../../../utils/session.php";
include "../../../config/database.php";
include "../../../models/pendudukFunctions.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesan = mysqli_escape_string($conn, $_POST['pesan']);
    $kategori = mysqli_escape_string($conn, $_POST['kategori']);
    $status = 'proses';
    $nik = $_SESSION['nik'];
    echo $nik;

    // Proses upload foto
    $file = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $targetDir = "../../../assets/uploads/";
        $fileName = time() . "_" . basename($_FILES['foto']['name']);
        $targetFilePath = $targetDir . $fileName;

        // Cek file yang diupload
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFilePath)) {
            $file = $fileName;
        } else {
            echo "<script>
                        alert('Gagal mengupload foto!');
                        // location.href='../index.php';
                    </script>";
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
        echo "<script>
                alert('Pengaduan berhasil ditambahkan!');
                location.href='../index.php';
            </script>";
    } else {
        echo "<script>
                alert('Pengaduan gagal ditambahkan!');
                location.href='../tulisPengaduan.php';
            </script>";
    }
}
