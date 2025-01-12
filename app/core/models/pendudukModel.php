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
        $data['fotoProfil'],
    );

    return mysqli_stmt_execute($stmt);
}

function getPendudukByNik($conn, $nik)
{
    $sql = "SELECT * FROM tb_penduduk WHERE nik_penduduk = '$nik'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}
