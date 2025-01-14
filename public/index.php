<?php
include "../app/config/database.php";
include "../app/core/models/pendudukModel.php";
include "../app/core/utils/alerts.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_escape_string($conn, $_POST['username']);
    $password = mysqli_escape_string($conn, $_POST['password']);

    $data = getPendudukByUsername($conn, $username);

    if ($data) {
        if (password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['nik'] = $data['nik_penduduk'];
            $_SESSION['role'] = 'penduduk';

            $redirectUrl = "../app/views/penduduk/index.php";

            showAlert("success", "Login Berhasil!", "", $redirectUrl);
        } else {
            $redirectUrl = "index.php";
            showAlert("error", "Password salah!", "", $redirectUrl);
        }
    } else {
        $redirectUrl = "index.php";
        showAlert("error", "Username tidak ditemukan!", "", $redirectUrl);
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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="assets/css/sign-in.css" rel="stylesheet">
</head>

<body class="relative">
    <a href="admin-login.php" class="position-absolute btn btn-success top-0 end-0 mt-3 me-3">Login Admin</a>

    <form action="" method="POST" class="form-signin">
        <div class="text-center mb-4">
            <img class="mb-4" src="assets/images/jombang-logo.png" alt="Logo Pemkab Jombang" width="72">
            <h1 class="h3 mb-3 font-weight-normal">Dukcapil Care Jombang</h1>
            <p>Selamat Datang di Sistem Informasi Pengaduan Masyarakat Dinas Kependudukan & Pencatatan Sipil Kabupaten Jombang!</p>
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

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block w-100" type="submit">Login</button>
        <p class="text-center mt-2">Belum memiliki akun? <span><a href="../app/views/penduduk/register.php" class="text-decoration-none fw-semibold">Daftar sekarang</a></span></p>
        <p class="mt-3 mb-3 text-muted text-center">&copy; 2025</p>
    </form>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>

</html>