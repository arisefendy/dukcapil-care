<?php
// Mendapatkan username admin
function getAdminByUsername($conn, $username)
{
    $sql = "SELECT * FROM tb_petugas WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}
