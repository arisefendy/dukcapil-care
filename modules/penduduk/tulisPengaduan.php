<?php
include "../../utils/session.php";
include "../../models/pendudukFunctions.php";
include "../../config/database.php";

$kategoriPengaduan = getAllKategoriPengaduan($conn);

?>

<div class="card shadow">
    <div class="card-header">
        <a href="index.php" class="btn btn-primary">
            <i class="fa-solid fa-arrow-left"></i>
            <span class="ms-2">Kembali</span>
        </a>
    </div>
    <div class="card-body">

        <form action="actions/addPengaduan.php" method="post" enctype="multipart/form-data" class="d-flex flex-column gap-3 p-3">
            <!-- <input type="hidden" value="create"> -->

            <h4 class="text-center mb-2">Tulis Pengaduan</h4>

            <div class="form-group flex-column">
                <label for="kategoriPengaduan" class="mb-1">Kategori Pengaduan</label>
                <select class="form-control" id="kategoriPengaduan" name="kategori" required>
                    <option value="" disabled selected>Pilih kategori</option>

                    <?php
                    foreach ($kategoriPengaduan as $kategori) {
                        echo "<option value='" . $kategori['id_kategori'] . "'>" . $kategori['nama_kategori'] . "</option>";
                    }
                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="pesan" class="mb-1">Isi Laporan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="5" placeholder="Jelaskan pengaduan Anda secara rinci..." required></textarea>
            </div>

            <div class="form-group">
                <label for="foto" class="mb-1">Foto (Opsional)</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
            </div>

        </form>

    </div>
</div>