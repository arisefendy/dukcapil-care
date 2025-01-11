<?php

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    switch ($url) {
        case 'tulis-pengaduan':
            include "tulisPengaduan.php";
            break;
        case 'data-pengaduan':
            include "dataPengaduan.php";
            break;
        case 'profil':
            include "profil.php";
            break;
        default:
            include "beranda.php";
            break;
    }
} else {
    include "beranda.php";
}
