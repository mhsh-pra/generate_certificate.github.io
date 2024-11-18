<?php
session_start();
include 'db.php';

// Cek apakah pengguna sudah login dan perannya adalah 'user'
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <style>
        /* Style umum untuk body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Kontainer utama dashboard */
        .dashboard-container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Judul dashboard */
        h1 {
            text-align: center;
            color: #333;
            font-size: 2em;
        }

        /* Menampilkan pesan selamat datang */
        p {
            font-size: 1.2em;
            color: #555;
            text-align: center;
            margin: 10px 0;
        }

        /* Menu sidebar */
        .menu {
            margin-top: 30px;
        }

        .menu ul {
            list-style-type: none;
            padding: 0;
        }

        .menu ul li {
            margin-bottom: 15px;
        }

        .menu ul li a {
            text-decoration: none;
            font-size: 1.1em;
            color: #333;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
            background-color: #f0f0f0;
            transition: background-color 0.3s;
        }

        .menu ul li a:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Style logout link */
        a[href="logout.php"] {
            display: block;
            text-align: center;
            margin-top: 30px;
            font-size: 1.1em;
            color: #007bff;
            text-decoration: none;
            border: 2px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        a[href="logout.php"]:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Dashboard User</h1>
        <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
        
        <!-- Menu -->
        <div class="menu">
            <ul>
                <li><a href="company_profile.php">Lihat Company Profile</a></li>
                <li><a href="view_participants.php">Lihat Data Peserta</a></li>
                <li><a href="print_participants.php">Cetak Peserta</a></li>
            </ul>
        </div>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
