<?php
include "../../config/database.php";
include "../../core/models/pendudukModel.php";
include "../../core/utils/alerts.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'nik' => mysqli_escape_string($conn, $_POST['nik']),
        'nama' => mysqli_escape_string($conn, $_POST['nama']),
        'username' => mysqli_escape_string($conn, $_POST['username']),
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'email' => mysqli_escape_string($conn, $_POST['email']),
        'telp' => mysqli_escape_string($conn, $_POST['telp']),
        'alamat' => mysqli_escape_string($conn, $_POST['alamat']),
        'fotoProfil' => 'default.jpg',
    ];

    // Proses register
    $result = registerPenduduk($conn, $data);

    if ($result) {
        $redirectUrl = '../../../public/index.php';

        showAlert('success', 'Berhasil', 'Pendaftaran berhasil! Silahkan login.', $redirectUrl);
    } else {
        $redirectUrl = 'register.php';
        showAlert('error', 'Gagal', "Pendaftaran gagal, silahkan coba lagi.", $redirectUrl);
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Dukcapil Care Jombang</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../public/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles -->
    <link href="../../../public/assets/css/sign-in.css" rel="stylesheet">
</head>

<body>
    <form action="" method="POST" class="form-signin">
        <div class="text-center mb-4">
            <img class="mb-4" src="../../../public/assets/images/jombang-logo.png" alt="Logo Pemkab Jombang" width="72">
            <h1 class="h3 mb-3 font-weight-normal">Dukcapil Care Jombang</h1>
            <p>Silahkan Masukan Biodata untuk Mendaftar Aplikasi Pengaduan Masyarakat Dispendukcapil Jombang.</p>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputNik" class="form-control" name="nik" placeholder="NIK" maxlength="16" required autofocus>
            <label for="inputNik">NIK</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputNama" class="form-control" name="nama" placeholder="Nama Lengkap" required autofocus>
            <label for="inputNama">Nama Lengkap</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
            <label for="inputUsername">Username</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
            <label for="inputPassword">Password</label>
            <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
        </div>

        <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required autofocus>
            <label for="inputEmail">Email</label>
        </div>

        <div class="form-label-group">
            <input type="number" id="inputTelp" class="form-control" name="telp" placeholder="No. Telepon" required autofocus>
            <label for="inputTelp">No. Telepon</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputAlamat" class="form-control" name="alamat" placeholder="Alamat" required autofocus>
            <label for="inputAlamat">Alamat</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block w-100" type="submit">Daftar</button>
        <p class="text-center mt-2">Sudah memiliki akun? <span><a href="../../../public/index.php" class="text-decoration-none fw-semibold">Login</a></span></p>
        <p class="mt-3 mb-3 text-muted text-center">&copy; 2025</p>
    </form>

    <!-- Bootstrap JS -->
    <script src="../../../public/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="../../../public/assets/js/script.js"></script>
</body>

</html>