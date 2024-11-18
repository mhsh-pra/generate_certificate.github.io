<?php
session_start(); // Mulai sesi
include 'db.php'; // Menghubungkan ke database

// Cek apakah user sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.php"); // Jika tidak login, arahkan ke login
    exit();
}

// Logika untuk kembali ke dashboard sesuai role
if ($_SESSION['role'] === 'admin') {
    header("Location: dashboard_admin.php"); // Redirect ke dashboard admin
    exit();
} else {
    header("Location: dashboard_user.php"); // Redirect ke dashboard user
    exit();
}
?>
