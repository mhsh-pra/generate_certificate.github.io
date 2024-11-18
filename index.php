<?php
session_start(); // Memulai session

// Cek apakah user sudah login
if (isset($_SESSION['user_role'])) {
    // Jika role user adalah 'admin', arahkan ke dashboard admin
    if ($_SESSION['user_role'] === 'admin') {
        header("Location: dashboard_admin.php");
        exit();
    } 
    // Jika role user adalah 'user', arahkan ke dashboard user
    elseif ($_SESSION['user_role'] === 'user') {
        header("Location: dashboard_user.php");
        exit();
    }
} else {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}
?>
