<?php
include "../../core/utils/session.php";
include "../../config/database.php";
include "../../core/models/petugasModel.php";
include "../../core/models/pengaduanModel.php";

$nik = $_SESSION['nik'];

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
<div class="hero-section text-center py-5"">
    <div class=" container">
    <h1 class="display-4 fw-bold">Selamat Datang, <span class="text-primary"><?= $petugasData['nama']; ?></span>!</h1>
    <p class="lead mb-4">Kelola pengaduan dengan lebih mudah dan efisien. Pantau laporan dan status pengaduan di sini.</p>
</div>
</div>

<!-- Dashboard section -->
<div class="container-fluid py-4">
    <div class="row">
        <!-- Statistik Ringkasan -->
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title text-secondary text-center">Total Pengaduan</h5>
                    <h2 class="fw-bold text-primary text-center"><?= $totalPengaduan ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title text-secondary text-center">Pengaduan Selesai</h5>
                    <h2 class="fw-bold text-success text-center"><?= $pengaduanSelesai ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title text-secondary text-center">Pengaduan Masuk</h5>
                    <h2 class="fw-bold text-warning text-center"><?= $pengaduanMasuk ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card shadow border-0">
                <div class="card-body">
                    <h5 class="card-title text-secondary text-center">Jumlah Petugas</h5>
                    <h2 class="fw-bold text-info text-center"><?= $totalPetugas ?></h2>
                </div>
            </div>
        </div>
    </div>

</div>