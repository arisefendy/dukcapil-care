<?php
// Mendapatkan semua data petugas
function getAllPetugas($conn)
{
    $sql = "SELECT a.*, l.nama_level 
            FROM tb_petugas a 
            JOIN tb_level_petugas l ON a.id_level = l.id_level ORDER BY a.created_at ASC";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


// Mendapatkan username admin
function getPetugasByUsername($conn, $username)
{
    $sql = "SELECT p.*, l.nama_level
            FROM tb_petugas p
            JOIN tb_level_petugas l ON p.id_level = l.id_level
            WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

// Mendapatkan data petugas by NIK
function getPetugasByNik($conn, $nik)
{
    $sql = "SELECT a.*, l.nama_level 
            FROM tb_petugas a 
            JOIN tb_level_petugas l ON a.id_level = l.id_level
            WHERE a.nik_petugas = '$nik' ORDER BY a.created_at ASC";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

// Menghitung data petugas
function getPetugasSummary($conn)
{
    $sql = "
        SELECT 
            COUNT(*) AS total_petugas,
            SUM(CASE WHEN id_level = 1 THEN 1 ELSE 0 END) AS petugas_admin,
            SUM(CASE WHEN id_level = 2 THEN 1 ELSE 0 END) AS petugas_operator
        FROM tb_petugas
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}

// Mendapat data level_petugas
function getLevelPetugas($conn)
{
    $sql = "SELECT * FROM tb_level_petugas";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Menambah petugas
function addPetugas($conn, $data)
{
    $sql = "INSERT INTO tb_petugas (nik_petugas, nama, username, password, email, no_telp, alamat, foto_profil, id_level) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'sssssssss',
        $data['nik'],
        $data['nama'],
        $data['username'],
        $data['password'],
        $data['email'],
        $data['telp'],
        $data['alamat'],
        $data['fotoProfil'],
        $data['level'],
    );

    return mysqli_stmt_execute($stmt);
}

// Update data
function updatePetugas($conn, $data)
{
    $sql = 'UPDATE tb_petugas SET nama = ?, email = ?, no_telp = ?, alamat = ? WHERE nik_petugas = ?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'sssss',
        $data['nama'],
        $data['email'],
        $data['no_telp'],
        $data['alamat'],
        $data['nik']
    );

    return mysqli_stmt_execute($stmt);
}

// Menghapus petugas
function deletePetugasByNik($conn, $nik)
{
    $sql = "DELETE FROM tb_petugas WHERE nik_petugas ='$nik'";
    return mysqli_query($conn, $sql);
}
