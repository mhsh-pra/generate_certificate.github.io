<?php
session_start(); // Memulai session

// Menghapus semua session
session_unset();
session_destroy();

// Mengalihkan ke halaman login
header("Location: login.php");
exit();
?>
