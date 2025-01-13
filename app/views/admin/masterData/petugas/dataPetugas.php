<?php
include "../../core/models/petugasModel.php";
include "../../config/database.php";

$nik = $_SESSION['nik'];

// Mendapat semua data petugas
$userData = getAllPetugas($conn, $nik);

// Mendapat level petugas
$levelPetugas = getLevelPetugas($conn);

// Proses tambah petugas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'nik' => mysqli_escape_string($conn, $_POST['nik']),
        'nama' => mysqli_escape_string($conn, $_POST['nama']),
        'username' => mysqli_escape_string($conn, $_POST['username']),
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'email' => mysqli_escape_string($conn, $_POST['email']),
        'telp' => mysqli_escape_string($conn, $_POST['telp']),
        'alamat' => mysqli_escape_string($conn, $_POST['alamat']),
        'fotoProfil' => 'default.jpg',
        'level' => mysqli_escape_string($conn, $_POST['level']),
    ];

    // Cek apakah username sudah ada
    $username = $data['username'];
    $checkUsername = getPetugasByUsername($conn, $username);

    if ($checkUsername) {
        $redirectUrl = '?url=data-petugas';
        showAlert('error', 'Gagal', "Username sudah terdaftar, silahkan gunakan username lain.");
    } else {

        // Insert data petugas
        $result = addPetugas($conn, $data);

        if ($result) {
            $redirectUrl = '?url=data-petugas';

            showAlert('success', 'Berhasil', 'Petugas telah berhasil ditambahkan.', $redirectUrl);
        } else {
            $redirectUrl = '?url=data-petugas';

            showAlert('error', 'Gagal', 'Gagal menambahkan petugas, silahkan coba lagi.', $redirectUrl);
        }
    }
}

?>

<div class="card shadow">
    <?php include '../templates/cardHeader.php'; ?>
    <div class="card-body">

        <button type="button" class="btn btn-primary mb-4 ms-3" data-bs-toggle="modal" data-bs-target="#tambahPetugasModal">
            <i class="fa-solid fa-circle-plus"></i>
            <span class="ms-2">Tambah</span>
        </button>

        <div class="d-flex flex-column justify-content-center px-3">
            <div class="table-responsive">
                <table id="dataPetugasTable" class="table table-bordered table-striped">
                    <thead class="table-primary text-center">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Level</th>
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
                                    <td><?= $data['nik_petugas'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['nama_level'] ?></td>
                                    <td class="text-center">
                                        <a href="?url=detail-petugas&id=<?= $data['nik_petugas'] ?>" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-triangle-exclamation"></i><span class="ms-1">Detail</span></a>
                                        <a href="?url=hapus-petugas&id=<?= $data['nik_petugas'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa-regular fa-trash-can"></i><span class="ms-1">Hapus</span></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data petugas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Petugas -->
<div class="modal fade" id="tambahPetugasModal" tabindex="-1" aria-labelledby="tambahPetugasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header bg-success bg-opacity-75 text-white">
                <h5 class="modal-title" id="tambahPetugasModalLabel">Form Tambah Petugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body Modal -->
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3 d-flex align-items-center">
                        <label for="nik" class="me-3" style="width: 20%;">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            placeholder="Masukkan NIK" required
                            maxlength="16"
                            pattern="\d{16}"
                            title="NIK harus terdiri dari 16 digit angka">
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="nama" class="me-3" style="width: 20%;">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="username" class="me-3" style="width: 20%;">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="mb-3 d-flex align-items-center position-relative">
                        <label for="password" class="me-3" style="width: 20%;">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Masukkan Password" required>
                        <i class="fa-regular fa-eye-slash" id="togglePassword"></i>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="email" class="me-3" style="width: 20%;">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="telp" class="me-3" style="width: 20%;">No Telepon</label>
                        <input type="number" class="form-control" id="telp" name="telp" placeholder="Masukkan No. Telepon" required>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="alamat" class="me-3" style="width: 20%;">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <label for="level" class="me-3" style="width: 20%;">Level</label>
                        <select class="form-select" id="level" name="level" required>
                            <option value="" disabled selected>Pilih level</option>
                            <?php
                            foreach ($levelPetugas as $level) {
                                echo "<option value='" . $level['id_level'] . "'>" . $level['nama_level'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>