<?php include "../../core/utils/session.php"; ?>

<!-- Hero Section -->
<div class="hero-section text-black text-center py-5">
    <h1>Selamat datang di Dukcapil Care Jombang!</h1>
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

        <!-- Recent Announcements Section -->
        <!-- <div class="mt-5">
                        <h3>Pengumuman Terbaru</h3>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">Penting: Pengaduan hanya dapat diajukan selama jam kerja</h5>
                                <p class="mb-1">Pastikan pengaduan Anda diajukan pada jam kerja untuk diproses lebih cepat.</p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">Informasi Layanan Baru</h5>
                                <p class="mb-1">Layanan pengaduan sekarang dapat dilakukan melalui aplikasi mobile.</p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <h5 class="mb-1">Syarat Pengaduan</h5>
                                <p class="mb-1">Pastikan Anda telah melengkapi semua persyaratan yang dibutuhkan sebelum mengajukan pengaduan.</p>
                            </a>
                        </div>
                    </div> -->
    </div>
</div>