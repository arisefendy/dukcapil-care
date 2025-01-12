<?php

// Mengambil data tanggapan by ID pengaduan
function getTanggapanByIdPengaduan($conn, $id)
{
    $sql = "SELECT * FROM pengaduan, tanggapan WHERE tanggapan.id_pengaduan='$id' AND pengaduan.id_pengaduan='$id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        return "<div class='alert alert-danger'>Maaf, Pengaduan anda belum ditanggapi.</div>";
    } else {
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}
