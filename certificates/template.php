<?php
session_start();
include '../db.php'; // Menyertakan koneksi ke database

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil ID peserta yang ingin dicetak sertifikatnya
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data peserta berdasarkan ID
    $sql = "SELECT * FROM participants WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $participant = $result->fetch_assoc();

    // Jika data peserta tidak ditemukan
    if (!$participant) {
        die("Data peserta tidak ditemukan.");
    }
} else {
    die("ID peserta tidak ditemukan.");
}

// Menutup statement dan koneksi database
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Peserta PKL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .certificate-container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 5px solid #000;
            text-align: center;
        }
        .certificate-header {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .certificate-body {
            font-size: 20px;
            margin: 30px 0;
        }
        .certificate-footer {
            font-size: 18px;
            margin-top: 40px;
        }
        .certificate-footer .status {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-header">
            Sertifikat Pelatihan Kerja Praktik
        </div>
        <div class="certificate-body">
            <p><strong>Nama Peserta:</strong> <?php echo htmlspecialchars($participant['name']); ?></p>
            <p><strong>Jurusan:</strong> <?php echo htmlspecialchars($participant['major']); ?></p>
            <p><strong>Perusahaan:</strong> <?php echo htmlspecialchars($participant['company']); ?></p>
            <p><strong>Tanggal Mulai:</strong> <?php echo htmlspecialchars($participant['start_date']); ?></p>
            <p><strong>Tanggal Selesai:</strong> <?php echo htmlspecialchars($participant['end_date']); ?></p>
            <p><strong>Deskripsi Pekerjaan:</strong><br><?php echo nl2br(htmlspecialchars($participant['job_description'])); ?></p>
        </div>
        <div class="certificate-footer">
            <p><strong>Status:</strong> <span class="status"><?php echo htmlspecialchars($participant['status']); ?></span></p>
            <p>Terima kasih atas kontribusi dan kerjasamanya.</p>
        </div>
    </div>

    <script>
        // Fungsi untuk mencetak sertifikat
        function printCertificate() {
            window.print();
        }

        // Menambahkan tombol untuk mencetak sertifikat
        document.addEventListener('DOMContentLoaded', function() {
            var printButton = document.createElement('button');
            printButton.innerHTML = 'Cetak Sertifikat';
            printButton.classList.add('btn', 'btn-primary', 'mt-4');
            printButton.onclick = printCertificate;
            document.body.appendChild(printButton);
        });
    </script>
</body>
</html>
