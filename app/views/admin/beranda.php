<?php
include "../../core/utils/session.php";
include "../../config/database.php";
include "../../core/models/petugasModel.php";
include "../../core/models/pengaduanModel.php";

$nik = $_SESSION['nik'];
$level = $_SESSION['level'];

$petugasData = getPetugasByNik($conn, $nik);

// Mendapat ringkasan total pengaduan
$summaryPengaduan = getPengaduanSummary($conn);

// Set variabel untuk ringkasan pengaduan
$totalPengaduan = $summaryPengaduan['total_pengaduan'];
$pengaduanSelesai = $summaryPengaduan['pengaduan_selesai'];
$pengaduanMasuk = $summaryPengaduan['pengaduan_masuk'];

// Mendapat ringkasan total petugas
$summaryPetugas = getPetugasSummary($conn);

$totalPetugas = $summaryPetugas['total_petugas'];

?>

<!-- Hero Section -->
<div class="hero-section text-center py-5 bg-light shadow-sm">
    <div class="container">
        <h1 class="display-4 fw-bold">
            Selamat Datang, <span class="text-primary"><?= $petugasData['nama']; ?></span>!
        </h1>
        <p class="lead mb-4 text-muted">
            Kelola pengaduan dengan lebih mudah dan efisien. Pantau laporan dan status pengaduan di sini.
        </p>
    </div>
</div>

<!-- Dashboard Section -->
<div class="container-fluid py-4">
    <div class="row g-3 justify-content-center">
        <!-- Statistik Ringkasan -->
        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 text-center">
                <div class="card-body">
                    <div class="icon mb-3 text-primary">
                        <i class="fa-solid fa-envelope fa-2x"></i>
                    </div>
                    <h5 class="card-title text-secondary">Total Pengaduan</h5>
                    <h2 class="fw-bold text-primary"><?= $totalPengaduan ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 text-center">
                <div class="card-body">
                    <div class="icon mb-3 text-success">
                        <i class="fa-solid fa-check-circle fa-2x"></i>
                    </div>
                    <h5 class="card-title text-secondary">Pengaduan Selesai</h5>
                    <h2 class="fw-bold text-success"><?= $pengaduanSelesai ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 text-center">
                <div class="card-body">
                    <div class="icon mb-3 text-warning">
                        <i class="fa-solid fa-inbox fa-2x"></i>
                    </div>
                    <h5 class="card-title text-secondary">Pengaduan Masuk</h5>
                    <h2 class="fw-bold text-warning"><?= $pengaduanMasuk ?></h2>
                </div>
            </div>
        </div>

        <!-- Jika level Administrator tampilkan card Jumlah Petugas -->
        <?php if ($level === 'Administrator') {
            echo '<div class="col-lg-3 col-md-6">';
        }
        // Jika level Operator hidden card Jumlah Petugas
        else if ($level === 'Operator') {
            echo '<div class="d-none col-lg-3 col-md-6">';
        } ?>

        <div class="card shadow border-0 text-center">
            <div class="card-body">
                <div class="icon mb-3 text-info">
                    <i class="fa-solid fa-users fa-2x"></i>
                </div>
                <h5 class="card-title text-secondary">Jumlah Petugas</h5>
                <h2 class="fw-bold text-info"><?= $totalPetugas ?></h2>
            </div>
        </div>
    </div>
</div>
</div>