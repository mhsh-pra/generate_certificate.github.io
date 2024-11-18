<?php
session_start();
include 'db.php'; // Menghubungkan ke database

// Cek apakah pengguna adalah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

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

    if ($stmt->execute()) {
        $success_message = "Data berhasil disimpan!";
    } else {
        $error_message = "Terjadi kesalahan: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Peserta PKL</title>
    <style>
        /* Style umum untuk body */
/* Style umum untuk body */
body {
    font-family: Helvetica;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Kontainer untuk form input data */
.input-container {
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Perbaikan: pastikan konten dimulai dari atas */
    min-height: 100vh; /* Pastikan kontainer cukup tinggi */
    padding: 20px;
    box-sizing: border-box; /* Pastikan padding tidak mempengaruhi ukuran kontainer */
}

/* Box form input */
.input-box {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    text-align: center;
}

/* Header form */
.input-box h1 {
    margin-bottom: 20px;
    color: #333;
    font-size: 1.8em; /* Meningkatkan ukuran font agar lebih jelas */
}

/* Style untuk form input */
.input-box label {
    display: block;
    margin-bottom: 8px;
    color: #555;
    font-weight: bold;
}

.input-box input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Button Submit */
.input-box button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.input-box button:hover {
    background-color: #45a049;
}

/* Link Kembali */
.input-box a {
    display: inline-block;
    margin-top: 20px;
    color: #007bff;
    text-decoration: none;
}

.input-box a:hover {
    text-decoration: underline;
}

/* Responsif untuk perangkat kecil */
@media (max-width: 600px) {
    .input-container {
        padding: 10px;
    }

    .input-box {
        padding: 20px;
    }

    button {
        font-size: 1em;
    }
}


    </style>
</head>
<body>
    <div class="input-container">
        <div class="input-box">
            <h1>Input Data Peserta PKL</h1>

            <?php if (isset($success_message)): ?>
                <p class="message"><?php echo $success_message; ?></p>
            <?php elseif (isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form method="post">
                <div class="input-group">
                    <label for="nisn">NISN:</label>
                    <input type="text" id="nisn" name="nisn" required>
                </div>
                <div class="input-group">
                    <label for="nama_lengkap">Nama Lengkap:</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="input-group">
                    <label for="jurusan">Jurusan:</label>
                    <input type="text" id="jurusan" name="jurusan" required>
                </div>
                <div class="input-group">
                    <label for="tanggal_mulai">Tanggal Mulai PKL:</label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
                <div class="input-group">
                    <label for="tanggal_selesai">Tanggal Selesai PKL:</label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>
                </div>
                <div class="input-group">
                    <label for="nilai_kerajinan">Nilai Kerajinan:</label>
                    <input type="number" id="nilai_kerajinan" name="nilai_kerajinan" required>
                </div>
                <div class="input-group">
                    <label for="nilai_disiplin">Nilai Disiplin:</label>
                    <input type="number" id="nilai_disiplin" name="nilai_disiplin" required>
                </div>
                <div class="input-group">
                    <label for="nilai_kerjasama">Nilai Kerjasama:</label>
                    <input type="number" id="nilai_kerjasama" name="nilai_kerjasama" required>
                </div>
                <div class="input-group">
                    <label for="nilai_inisiatif">Nilai Inisiatif:</label>
                    <input type="number" id="nilai_inisiatif" name="nilai_inisiatif" required>
                </div>
                <div class="input-group">
                    <label for="nilai_tanggung_jawab">Nilai Tanggung Jawab:</label>
                    <input type="number" id="nilai_tanggung_jawab" name="nilai_tanggung_jawab" required>
                </div>
                <button type="submit">Simpan</button>
            </form>

            <div class="back-link">
                <a href="dashboard_admin.php">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
