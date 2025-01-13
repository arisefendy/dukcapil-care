<?php

if (!isset($_SESSION['role'])) {
    header('Location: ../../../public/index.php');
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $role = $_SESSION['role'];

    switch ($role) {
            // Route penduduk
        case 'penduduk':
            switch ($url) {
                case 'tulis-pengaduan':
                    $pageTitle = "Tulis Pengaduan";
                    include "tulisPengaduan.php";
                    break;
                case 'profil':
                    $pageTitle = "Profil";
                    include "profil.php";
                    break;
                case 'riwayat-pengaduan':
                    $pageTitle = "Riwayat Pengaduan";
                    include "riwayatPengaduan.php";
                    break;
                case 'detail-pengaduan':
                    $pageTitle = "Detail Pengaduan";
                    include "detailPengaduan.php";
                    break;
                case 'lihat-tanggapan':
                    $pageTitle = "Lihat Tanggapan";
                    include "lihatTanggapan.php";
                    break;
                default:
                    $pageTitle = "Beranda Penduduk";
                    include "beranda.php";
                    break;
            }
            break;

        case 'admin':
            switch ($url) {
                case 'profil':
                    $pageTitle = "Profil";
                    include "profil.php";
                    break;
                case 'data-petugas':
                    $pageTitle = "Data Petugas";
                    include "masterData/petugas/dataPetugas.php";
                    break;
                case 'detail-petugas':
                    $pageTitle = "Detail Petugas";
                    include "masterData/petugas/detailPetugas.php";
                    break;
                case 'tambah-petugas':
                    $pageTitle = "Tambah Petugas";
                    include "masterData/petugas/tambahPetugas.php";
                    break;
                case 'hapus-petugas':
                    include 'delete.php';
                    break;
                case 'data-penduduk':
                    $pageTitle = "Data Penduduk";
                    include "masterData/penduduk/dataPenduduk.php";
                    break;
                case 'detail-penduduk':
                    $pageTitle = "Detail Penduduk";
                    include "masterData/penduduk/detailPenduduk.php";
                    break;
                case 'hapus-penduduk':
                    include 'delete.php';
                    break;
                case 'pengaduan-masuk':
                    $pageTitle = "Data Pengaduan Masuk";
                    include "pengaduan/pengaduanMasuk.php";
                    break;
                case 'pengaduan-selesai':
                    $pageTitle = "Data Pengaduan Selesai";
                    include "pengaduan/pengaduanSelesai.php";
                    break;
                case 'detail-pengaduan':
                    $pageTitle = "Detail Pengaduan";
                    include "../penduduk/detailPengaduan.php";
                    break;
                case 'lihat-tanggapan':
                    $pageTitle = "Lihat Tanggapan";
                    include "../penduduk/lihatTanggapan.php";
                    break;
                case 'beri-tanggapan':
                    $pageTitle = "Beri Tanggapan";
                    include "pengaduan/beriTanggapan.php";
                    break;
                default:
                    $pageTitle = "Beranda Admin";
                    include "beranda.php";
                    // echo "Halaman Beranda Admin";
                    break;
            }
    }
} else {
    switch ($_SESSION['role']) {
        case 'penduduk':
            $pageTitle = "Beranda Penduduk";
            include "beranda.php";
            break;
        case 'admin':
            $pageTitle = "Beranda Admin";
            include "beranda.php";
            // echo "Halaman Beranda Admin";
            break;
        default:
            header('Location: ../../../public/index.php');
            exit();
    }
}
