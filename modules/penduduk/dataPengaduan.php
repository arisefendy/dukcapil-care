<?php
include "../../utils/session.php";
include "../../models/pendudukFunctions.php";
include "../../config/database.php";

$nik = $_SESSION['nik'];

// Konfigurasi pagination
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Menghitung total data pengaduan
$sqlCount = "SELECT COUNT(*) as total FROM tb_pengaduan WHERE nik_penduduk = '$nik'";
$resultCount = mysqli_query($conn, $sqlCount);
$totalData = mysqli_fetch_assoc($resultCount)['total'];

// Mengambil data pengaduan
$dataPengaduan = getPengaduanByNik($conn, $nik, $limit, $offset);

// Menghitung total halaman
$totalPages = ceil($totalData / $limit);

?>

<h3 class="fs-4 fw-semibold text-center mb-5">Data Pengaduan</h3>

<div class="card-data-pengaduan d-flex flex-column justify-content-center px-5">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>Tanggal</th>
                    <th>Pesan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan data pengaduan -->
                <?php
                if (count($dataPengaduan) > 0) {
                    foreach ($dataPengaduan as $data) {
                        echo "<tr>
                        <td>{$data['created_at']}</td>
                        <td>{$data['pesan']}</td>
                        <td class='text-center'>{$data['nama_kategori']}</td>
                        <td class='text-center'><span class='badge bg-" . ($data['status'] === 'Selesai' ? 'success' : 'warning') . "'>{$data['status']}</span></td>
                        <td class='text-center'>
                            <a href='detailPengaduan.php?id={$data['id_pengaduan']}' class='btn btn-primary btn-sm'>Lihat Detail</a>
                            <a href='tanggapanPengaduan.php?id={$data['id_pengaduan']}' class='btn btn-secondary btn-sm'>Lihat Tanggapan</a>
                        </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data pengaduan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Navigasi Pagination -->
    <nav class="nav-page d-flex justify-content-end mt-3">
        <ul class="pagination">
            <!-- Tombol Previous -->
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
            <?php endif; ?>

            <!-- Tombol Angka Halaman -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <!-- Tombol Next -->
            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>