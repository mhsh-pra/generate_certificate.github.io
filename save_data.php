<?php
session_start();
include 'db.php'; // Koneksi ke database

// Cek apakah pengguna sudah login dan memiliki role admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Proses penyimpanan data jika metode request adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nisn = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jurusan = $_POST['jurusan'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $nilai_kerajinan = $_POST['nilai_kerajinan'];
    $nilai_disiplin = $_POST['nilai_disiplin'];
    $nilai_kerjasama = $_POST['nilai_kerjasama'];
    $nilai_inisiatif = $_POST['nilai_inisiatif'];
    $nilai_tanggung_jawab = $_POST['nilai_tanggung_jawab'];

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO nilai_pkl (nisn, nama_lengkap, jurusan, tanggal_mulai, tanggal_selesai, nilai_kerajinan, nilai_disiplin, nilai_kerjasama, nilai_inisiatif, nilai_tanggung_jawab)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssiiii", $nisn, $nama_lengkap, $jurusan, $tanggal_mulai, $tanggal_selesai, $nilai_kerajinan, $nilai_disiplin, $nilai_kerjasama, $nilai_inisiatif, $nilai_tanggung_jawab);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        echo "Data berhasil disimpan!";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();

    // Redirect kembali ke dashboard admin
    header("Location: dashboard_admin.php");
    exit();
}
?>
