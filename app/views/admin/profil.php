<?php
include "../../core/utils/session.php";
include "../../config/database.php";
include "../../core/models/petugasModel.php";

$nik = $_SESSION['nik'];

// Mendapatkan user data
$userData = getPetugasByNik($conn, $nik);

// Toggle form edit
$isEditing = isset($_GET['edit']) && $_GET['edit'] === 'true';

// Proses update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_escape_string($conn, $_POST['nama']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $no_telp = mysqli_escape_string($conn, $_POST['no_telp']);
    $alamat = mysqli_escape_string($conn, $_POST['alamat']);

    $data = [
        'nama' => $nama,
        'email' => $email,
        'no_telp' => $no_telp,
        'alamat' => $alamat,
        'nik' => $nik
    ];

    $result = updatePetugas($conn, $data);

    $redirectUrl = '?url=profil';
    if ($result) {
        showAlert('success', 'Berhasil', 'Berhasil update data profil.', $redirectUrl);
    } else {
        showAlert('error', 'Gagal', 'Gagal mengubah data profil.', $redirectUrl);
    }
}

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

                <!-- Form Update Profil -->
                <?php if ($isEditing): ?>
                    <form method="POST">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-secondary">NIK</th>
                                    <td><?= htmlspecialchars($userData['nik_petugas'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-secondary">Nama Lengkap</th>
                                    <td>
                                        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($userData['nama'], ENT_QUOTES, 'UTF-8') ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-secondary">Email</th>
                                    <td>
                                        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($userData['email'], ENT_QUOTES, 'UTF-8') ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-secondary">No. Telepon</th>
                                    <td>
                                        <input type="text" name="no_telp" class="form-control" value="<?= htmlspecialchars($userData['no_telp'], ENT_QUOTES, 'UTF-8') ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-secondary">Alamat</th>
                                    <td>
                                        <textarea name="alamat" class="form-control" rows="3" required><?= htmlspecialchars($userData['alamat'], ENT_QUOTES, 'UTF-8') ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-secondary">Level</th>
                                    <td><?= htmlspecialchars($userData['nama_level'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-save"></i> Simpan Perubahan
                            </button>
                            <a href="?url=profil" class="btn btn-secondary">
                                <i class="fa-solid fa-times"></i> Batal
                            </a>
                        </div>
                    </form>

                    <!-- Informasi Profil -->
                <?php else: ?>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row" class="text-secondary">NIK</th>
                                <td><?= htmlspecialchars($userData['nik_petugas'], ENT_QUOTES, 'UTF-8') ?></td>
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
                            <tr>
                                <th scope="row" class="text-secondary">Level</th>
                                <td><?= htmlspecialchars($userData['nama_level'], ENT_QUOTES, 'UTF-8') ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-end mt-3">
                        <a href="?url=profil&edit=true" class="btn btn-primary">
                            <i class="fa-solid fa-edit"></i> Edit Profil
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>