<?php include "../../core/utils/session.php"; ?>

<!-- Hero Section -->
<div class="hero-section text-black text-center py-5">
    <h1>Selamat datang di <span class="fw-bold" style="color: #14b8a6;">Dukcapil Care <span class="text-danger">Jombang</span></span>!</h1>
    <p class="lead">Tempat Anda dapat mengajukan pengaduan dan mengecek status pengaduan Anda.</p>
</div>

<!-- Dashboard Section -->
<div class="container mt-4">
    <div class="d-flex gap-5 justify-content-center">
        <!-- Card for Pengaduan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-exclamation-circle fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Tulis Pengaduan</h5>
                    <p class="card-text">Sampaikan Pertanyaan, Pengaduan & Saran Anda Seputar Kependudukan.</p>
                    <a href="index.php?url=tulis-pengaduan" class="btn btn-primary">Tulis Pengaduan</a>
                </div>
            </div>
        </div>

        <!-- Card for Riwayat Pengaduan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-history fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Riwayat Pengaduan</h5>
                    <p class="card-text">Cek riwayat pengaduan Anda yang sedang diproses atau sudah selesai.</p>
                    <a href="index.php?url=riwayat-pengaduan" class="btn btn-success">Lihat Riwayat</a>
                </div>
            </div>
        </div>
    </div>