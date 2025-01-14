<?php
include "../../core/models/pengaduanModel.php";
include "../../config/database.php";

$nik = $_SESSION['nik'];

$dataPengaduan = getPengaduanProcess($conn);
?>

<div class="card shadow">
    <?php include '../templates/cardHeader.php'; ?>
    <div class="card-body">

        <div class="d-flex flex-column justify-content-center px-5">
            <div class="table-responsive">
                <table id="dataPengaduanTable" class="table table-bordered table-striped">
                    <thead class="table-primary text-center">
                        <tr>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Pesan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($dataPengaduan) > 0): ?>
                            <?php foreach ($dataPengaduan as $data): ?>
                                <tr>
                                    <td><?= $data['created_at'] ?></td>
                                    <td><?= $data['nama_penduduk'] ?></td>
                                    <td><?= $data['nama_kategori'] ?></td>
                                    <td><?= $data['pesan'] ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-<?= $data['status'] === 'selesai' ? 'success' : 'warning' ?>">
                                            <?= ucfirst($data['status']) ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
                                            <a href="?url=detail-pengaduan&id=<?= $data['id_pengaduan'] ?>&role=petugas"
                                                class="btn btn-primary btn-sm position-relative"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Lihat detail">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="?url=beri-tanggapan&id=<?= $data['id_pengaduan'] ?>"
                                                class="btn btn-secondary btn-sm position-relative"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Beri tanggapan">
                                                <i class="fa-solid fa-comment"></i>
                                            </a>
                                            <a href="?url=hapus-pengaduan&id=<?= $data['id_pengaduan'] ?>"
                                                class="btn btn-danger btn-sm position-relative"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data pengaduan ini?');"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Hapus pengaduan">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data pengaduan masuk.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>