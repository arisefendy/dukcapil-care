<?php
include "../../core/utils/session.php";
include "../../config/database.php";
include "../../core/models/pendudukModel.php";

$nik = $_SESSION['nik'];

$userData = getPendudukByNik($conn, $nik);

?>

<div class="card shadow mb-4">
    <?php include '../templates/cardHeader.php' ?>

    <div class="card-body p-4">
        <div class="row py-2">
            <div class="col-md-4 text-center">
                <!-- Avatar -->
                <img src="../../../public/assets/uploads/profileImg/<?= $userData['foto_profil']; ?>" alt="Foto Profil" class="img-fluid rounded-circle shadow-sm mb-3" style="max-width: 150px;">
                <p class="text-muted mb-2">Foto Profil</p>
                <button class="btn btn-outline-primary btn-sm">
                    <i class="fa-solid fa-camera"></i> Ubah Foto
                </button>
            </div>
            <div class="col-md-8">
                <!-- Informasi Profil -->
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-secondary">NIK</th>
                            <td><?= htmlspecialchars($userData['nik_penduduk'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-secondary">Nama Lengkap</th>
                            <td><?= htmlspecialchars($userData['nama'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-secondary">Username</th>
                            <td><?= htmlspecialchars($userData['username'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-secondary">Email</th>
                            <td><?= htmlspecialchars($userData['email'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-secondary">No. Telepon</th>
                            <td><?= htmlspecialchars($userData['no_telp'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-secondary">Alamat</th>
                            <td><?= htmlspecialchars($userData['alamat'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end mt-3">
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-edit"></i> Edit Profil
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>