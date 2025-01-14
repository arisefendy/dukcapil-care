<?php
include "../../core/models/pengaduanModel.php";
include "../../config/database.php";

$nik = $_SESSION['nik'];

$dataPengaduan = getPengaduanByNik($conn, $nik);
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
                                    <td><?= $data['nama_kategori'] ?></td>
                                    <td><?= $data['pesan'] ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-<?= $data['status'] === 'selesai' ? 'success' : 'warning' ?>">
                                            <?= ucfirst($data['status']) ?>
                                        </span>
                                    </td>
                                    <td class="d-flex flex-column justify-content-center gap-2">
                                        <a href="?url=detail-pengaduan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-primary btn-sm text-start">
                                            <i class="fa-solid fa-eye"></i>
                                            <span class="ms-1"> Detail</span></a>
                                        <a href="?url=lihat-tanggapan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-secondary btn-sm text-start">
                                            <i class="fa-solid fa-comment"></i>
                                            <span class="ms-1"> Tanggapan</span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data pengaduan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>