<?php
include "../../core/models/pendudukModel.php";
include "../../config/database.php";

$nik = $_SESSION['nik'];

$userData = getAllPenduduk($conn);

?>

<div class="card shadow">
    <?php include '../templates/cardHeader.php'; ?>
    <div class="card-body">

        <div class="d-flex flex-column justify-content-center px-5">
            <div class="table-responsive">
                <table id="dataPendudukTable" class="table table-bordered table-striped">
                    <thead class="table-primary text-center">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">No. Telepon</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($userData) > 0): ?>
                            <?php
                            $no = 1;
                            foreach ($userData as $data):
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $data['nik_penduduk'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['no_telp'] ?></td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-2">
                                            <a href="?url=detail-penduduk&id=<?= $data['nik_penduduk'] ?>" class="btn btn-primary btn-sm position-relative"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Lihat detail">
                                                <i class="fa-solid fa-eye"></i></a>
                                            <a href="?url=hapus-penduduk&id=<?= $data['nik_penduduk'] ?>" class="btn btn-danger btn-sm position-relative"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Hapus Penduduk"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-regular fa-trash-can"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data penduduk.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>