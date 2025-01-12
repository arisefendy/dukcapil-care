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
                    // include "profil.php";
                    echo "Halaman Profil";
                    break;
                case 'data-petugas':
                    $pageTitle = "Data Petugas";
                    // include "dataPetugas.php";
                    echo "Halaman Data Petugas";
                    break;
                case 'data-penduduk':
                    $pageTitle = "Data Penduduk";
                    // include "dataPenduduk.php";
                    echo "Halaman Data Penduduk";
                    break;
                case 'pengaduan-masuk':
                    $pageTitle = "Pengaduan Masuk";
                    // include "pengaduanMasuk.php";
                    echo "Halaman Pengaduan Masuk";
                    break;
                case 'pengaduan-selesai':
                    $pageTitle = "Pengaduan Selesai";
                    // include "pengaduanSelesai.php";
                    echo "Halaman Pengaduan Selesai";
                    break;
                default:
                    $pageTitle = "Beranda Admin";
                    // include "beranda.php";
                    echo "Halaman Beranda Admin";
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
            // include "berandaAdmin.php";
            echo "Halaman Beranda Admin";
            break;
        default:
            header('Location: ../../../public/index.php');
            exit();
    }
}
