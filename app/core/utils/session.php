<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();  // Memulai sesi hanya jika belum dimulai
}

$BASE_URL = "http://localhost/dukcapil-care";

if (!isset($_SESSION['nik'])) {
    header("Location: " . $BASE_URL . "/public/index.php");
    exit;
}
