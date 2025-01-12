<?php

// Mendapatkan daftar kategori pengaduan
function getAllKategoriPengaduan($conn)
{
    $sql = "SELECT * FROM tb_kategori_pengaduan";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Membuat pengaduan
function addPengaduan($conn, $data)
{
    $sql = "INSERT INTO tb_pengaduan (pesan, file, status, nik_penduduk, id_kategori) VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'sssss',
        $data['pesan'],
        $data['file'],
        $data['status'],
        $data['nik'],
        $data['kategori']
    );

    return mysqli_stmt_execute($stmt);
}

// Mendapat detail pengaduan by ID pengaduan
function getPengaduanById($conn, $id)
{
    $sql = "SELECT p.*, k.nama_kategori 
            FROM tb_pengaduan p
            JOIN tb_kategori_pengaduan k ON p.id_kategori = k.id_kategori 
            WHERE p.id_pengaduan = '$id'";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_array($result, MYSQLI_ASSOC);
}

// Mendapat data pengaduan by NIK penduduk
function getPengaduanByNik($conn, $nik)
{
    $sql = "SELECT p.*, k.nama_kategori 
            FROM tb_pengaduan p
            JOIN tb_kategori_pengaduan k ON p.id_kategori = k.id_kategori 
            WHERE p.nik_penduduk = '$nik'";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
