<?php
session_start();
require 'vendor/autoload.php'; // Pastikan PhpSpreadsheet terinstal dengan composer dan diakses melalui autoload

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Periksa apakah pengguna adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
include 'db.php';

try {
    // Query untuk mendapatkan data siswa PKL
    $sql = "SELECT nisn, nama_lengkap, jurusan, tanggal_mulai, tanggal_selesai, 
                   nilai_kerajinan, nilai_disiplin, nilai_kerjasama, nilai_inisiatif, nilai_tanggung_jawab
            FROM nilai_pkl";
    $result = $conn->query($sql);

    // Buat Spreadsheet baru
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header kolom
    $sheet->setCellValue('A1', 'NISN');
    $sheet->setCellValue('B1', 'Nama Lengkap');
    $sheet->setCellValue('C1', 'Jurusan');
    $sheet->setCellValue('D1', 'Tanggal Mulai PKL');
    $sheet->setCellValue('E1', 'Tanggal Selesai PKL');
    $sheet->setCellValue('F1', 'Nilai Kerajinan');
    $sheet->setCellValue('G1', 'Nilai Disiplin');
    $sheet->setCellValue('H1', 'Nilai Kerjasama');
    $sheet->setCellValue('I1', 'Nilai Inisiatif');
    $sheet->setCellValue('J1', 'Nilai Tanggung Jawab');

    // Isi data
    $row = 2; // Mulai dari baris kedua karena baris pertama adalah header
    while ($data = $result->fetch_assoc()) {
        $sheet->setCellValue("A$row", $data['nisn']);
        $sheet->setCellValue("B$row", $data['nama_lengkap']);
        $sheet->setCellValue("C$row", $data['jurusan']);
        $sheet->setCellValue("D$row", $data['tanggal_mulai']);
        $sheet->setCellValue("E$row", $data['tanggal_selesai']);
        $sheet->setCellValue("F$row", $data['nilai_kerajinan']);
        $sheet->setCellValue("G$row", $data['nilai_disiplin']);
        $sheet->setCellValue("H$row", $data['nilai_kerjasama']);
        $sheet->setCellValue("I$row", $data['nilai_inisiatif']);
        $sheet->setCellValue("J$row", $data['nilai_tanggung_jawab']);
        $row++;
    }

    // Simpan file Excel
    $writer = new Xlsx($spreadsheet);
    $filename = "data_siswa_pkl.xlsx";

    // Set header untuk mengunduh file Excel
    header('Content-Type: application/vnd.ms-excel');
    header("Content-Disposition: attachment;filename=\"$filename\"");
    header('Cache-Control: max-age=0');

    // Eksekusi penulisan file
    $writer->save('php://output');
    exit();

} catch (Exception $e) {
    echo "Gagal mengekspor data ke Excel: " . $e->getMessage();
}
?>
