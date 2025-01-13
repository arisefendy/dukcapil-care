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
    $sql = "SELECT p.*, k.nama_kategori, u.nama 
            FROM tb_pengaduan p
            JOIN tb_kategori_pengaduan k ON p.id_kategori = k.id_kategori
            LEFT JOIN tb_penduduk u ON p.nik_penduduk = u.nik_penduduk 
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

// Mendapat semua data pengaduan
function getAllPengaduan($conn)
{
    $sql = "SELECT p.*, k.nama_kategori 
            FROM tb_pengaduan p
            JOIN tb_kategori_pengaduan k ON p.id_kategori = k.id_kategori";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Menghitung data pengaduan
function getPengaduanSummary($conn)
{
    $sql = "
        SELECT 
            COUNT(*) AS total_pengaduan,
            SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) AS pengaduan_selesai,
            SUM(CASE WHEN status = 'proses' THEN 1 ELSE 0 END) AS pengaduan_masuk
        FROM tb_pengaduan
    ";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}

// Menghitung jumlah pengaduan status 'proses'
function getPengaduanProcess($conn)
{
    $sql = "SELECT p.*, k.nama_kategori 
            FROM tb_pengaduan p
            JOIN tb_kategori_pengaduan k ON p.id_kategori = k.id_kategori 
            WHERE p.status = 'proses'";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Menghitung jumlah pengaduan status 'selesai'
function getPengaduanCompleted($conn)
{
    $sql = "SELECT p.*, k.nama_kategori 
            FROM tb_pengaduan p
            JOIN tb_kategori_pengaduan k ON p.id_kategori = k.id_kategori 
            WHERE p.status = 'selesai'";

    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Memberi tanggapan pengaduan
function addTanggapan($conn, $data)
{
    $sql = "INSERT INTO tb_tanggapan (tanggapan, file_tanggapan, id_pengaduan, nik_petugas) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        'ssss',
        $data['tanggapan'],
        $data['file'],
        $data['idPengaduan'],
        $data['nikPetugas']
    );

    return mysqli_stmt_execute($stmt);
}

// Update status pengaduan
function changePengaduanStatus($conn, $id)
{
    $sql = "UPDATE tb_pengaduan SET status = 'selesai' WHERE id_pengaduan = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $id);
    return mysqli_stmt_execute($stmt);
}
