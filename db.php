<?php
// Mengatur parameter koneksi ke database
$host = 'localhost'; // Host database (biasanya 'localhost')
$dbname = 'db_certificate'; // Nama database yang digunakan
$username = 'root'; // Username database
$password = ''; // Password database (kosong jika tidak ada password untuk user root)

// Menggunakan try-catch untuk menangani kesalahan dengan lebih baik
try {
    // Membuat koneksi ke database menggunakan MySQLi dengan error reporting
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Cek apakah koneksi berhasil
    if ($conn->connect_error) {
        throw new Exception("Koneksi gagal: " . $conn->connect_error); // Menghentikan eksekusi jika koneksi gagal
    }

    // Set charset untuk menghindari masalah encoding karakter
    $conn->set_charset("utf8");

} catch (Exception $e) {
    // Menangani error koneksi dan menampilkan pesan
    die("Terjadi kesalahan koneksi database: " . $e->getMessage());
}
?>
