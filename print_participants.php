<?php
session_start();
include 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID peserta dari form
$selected_ids = isset($_POST['selected_ids']) ? $_POST['selected_ids'] : [];

if (empty($selected_ids)) {
    echo "Tidak ada peserta yang dipilih.";
    exit();
}

// Query untuk mengambil data semua peserta yang dipilih
$ids = implode(",", array_map('intval', $selected_ids));
$sql = "SELECT * FROM nilai_pkl WHERE id IN ($ids)";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Data peserta tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Sertifikat Peserta PKL</title>
    <style>
        /* Styling untuk sertifikat */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .certificate-container {
            width: 800px;
            height: 600px;
            margin: 20px auto;
            position: relative;
            background: url('assets/images/template.png') no-repeat center center;
            background-size: cover;
            padding: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            color: #333;
        }
        .certificate-content {
            position: relative;
            font-size: 16px;
            line-height: 1.5;
            color: black;
        }
        .page-break {
            page-break-before: always;
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
    </script>
</head>
<body>
    <?php while($participant = $result->fetch_assoc()): ?>
        <!-- Halaman Depan Sertifikat -->
        <div class="certificate-container">
            <div class="certificate-content">
                <h1>Sertifikat Praktek Kerja Lapangan</h1>
                <p>Dengan ini menyatakan bahwa:</p>
                <p><b>Nama:</b> <?php echo htmlspecialchars($participant['nama_lengkap']); ?></p>
                <p><b>NISN:</b> <?php echo htmlspecialchars($participant['nisn']); ?></p>
                <p><b>Jurusan:</b> <?php echo htmlspecialchars($participant['jurusan']); ?></p>
                <p>telah melaksanakan Praktek Kerja Lapangan (PKL) di perusahaan ini dengan:</p>
                <p><b>Tanggal Mulai:</b> <?php echo htmlspecialchars($participant['tanggal_mulai']); ?></p>
                <p><b>Tanggal Selesai:</b> <?php echo htmlspecialchars($participant['tanggal_selesai']); ?></p>
                <p>Demikian sertifikat ini diberikan sebagai bukti telah melaksanakan Praktek Kerja Lapangan dengan baik.</p>
                <br><br>
                <p>--------------------</p>
                <p>Penanggung Jawab</p>
                <hr style="border-top: 1px solid #333;">
            </div>
        </div>

        <!-- Halaman Belakang untuk Penilaian -->
        <div class="certificate-container page-break">
            <div class="certificate-content">
                <h2>Aspek Penilaian</h2>
                <p>Penilaian untuk siswa <b><?php echo htmlspecialchars($participant['nama_lengkap']); ?></b> sebagai berikut:</p>
                <ul>
                    <li>Nilai Kerajinan: <?php echo htmlspecialchars($participant['nilai_kerajinan']); ?></li>
                    <li>Nilai Disiplin: <?php echo htmlspecialchars($participant['nilai_disiplin']); ?></li>
                    <li>Nilai Kerjasama: <?php echo htmlspecialchars($participant['nilai_kerjasama']); ?></li>
                    <li>Nilai Inisiatif: <?php echo htmlspecialchars($participant['nilai_inisiatif']); ?></li>
                    <li>Nilai Tanggung Jawab: <?php echo htmlspecialchars($participant['nilai_tanggung_jawab']); ?></li>
                </ul>
            </div>
        </div>

    <?php endwhile; ?>

    <button onclick="printPage()">Cetak Sertifikat</button>
</body>
</html>

<?php
$conn->close();
?>
