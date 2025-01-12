<?php
include "../core/utils/alerts.php";

session_start();
session_destroy();

$redirectUrl = "../../index.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dukcapil Care Jombang</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    showAlert("success", "Logout Berhasil!", '', $redirectUrl);
    ?>
</body>

</html>