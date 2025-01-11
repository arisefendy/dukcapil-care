<?php

// Mencari penduduk berdasarkan username
function getPendudukByUsername($conn, $username)
{
    $sql = "SELECT * FROM tb_penduduk WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

// Mendaftarkan penduduk baru
function registerPenduduk($conn, $data)
{
    $sql = "INSERT INTO tb_penduduk (nik_penduduk, nama, username, password, email, no_telp, alamat, foto_profil) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'ssssssss',
        $data['nik'],
        $data['nama'],
        $data['username'],
        $data['password'],
        $data['email'],
        $data['telp'],
        $data['alamat'],
        $data['fotoProfil']
    );

    return mysqli_stmt_execute($stmt);
}

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

// Mendapatkan daftar pengaduan berdasarkan nik
function getPengaduanByNik($conn, $nik, $limit, $offset)
{
    $sql = "SELECT p.*, k.nama_kategori 
            FROM tb_pengaduan p
            JOIN tb_kategori_pengaduan k ON p.id_kategori = k.id_kategori 
            WHERE p.nik_penduduk = '$nik' 
            LIMIT $limit OFFSET $offset";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
