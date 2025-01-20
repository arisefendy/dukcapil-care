<?php include "../../core/utils/session.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dukcapil Care Jombang</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../public/assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/responsive.bootstrap5.min.css">

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .nav-link-hover {
            position: relative;
            display: inline-block;
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        /* Hover Effect */
        .nav-link-hover::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            /* Ketebalan garis */
            background-color: #5eead4;
            /* Warna garis */
            transition: width 0.3s ease;
        }

        .nav-link-hover:hover::after {
            width: 100%;
        }

        .dropdown-menu .nav-link-hover:hover::after {
            background-color: #212529;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm fw-semibold" style="background: #14b8a6;">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="../../../public/assets/images/jombang-logo.png" alt="Logo" style="height: 40px;">
                    <span class="ms-2 fw-bold">Dukcapil Care</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto gap-2">
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-hover" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-hover" href="?url=profil">Profil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="pengaduanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pengaduan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="pengaduanDropdown">
                                <li><a class="dropdown-item" href="?url=tulis-pengaduan">Tulis Pengaduan</a></li>
                                <li><a class="dropdown-item" href="?url=riwayat-pengaduan">Riwayat Pengaduan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger" href="../logout.php">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="ms-1">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <div class="main mt-4" style="background: url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png');">
            <div class="container">
                <!-- Content -->
                <div>
                    <?php include "../../config/content.php"; ?>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-light py-2 mt-5 border-top">
            <div class="container text-center">
                <p class="mb-0 text-muted">&copy; 2025 | Dukcapil Care Jombang.</p>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/responsive.bootstrap5.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../../../public/assets/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script>
        $(document).ready(function() {
            if ($('#dataPengaduanTable').length) {
                $('#dataPengaduanTable').DataTable({
                    "responsive": true,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                    },
                    "order": [
                        [0, "desc"]
                    ],
                });
            }
        });
    </script>
</body>

</html>