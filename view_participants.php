<?php
session_start();
include 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
    exit();
}

// Ambil data peserta dari database
$sql = "SELECT id, nisn, nama_lengkap, jurusan, tanggal_mulai, tanggal_selesai, nilai_kerajinan, nilai_disiplin, nilai_kerjasama, nilai_inisiatif, nilai_tanggung_jawab FROM nilai_pkl";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peserta PKL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Peserta PKL</h1>
    <form action="print_participants.php" method="POST">
        <table border="1">
            <tr>
                <th>Pilih</th>
                <th>NISN</th>
                <th>Nama Lengkap</th>
                <th>Jurusan</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Nilai Kerajinan</th>
                <th>Nilai Disiplin</th>
                <th>Nilai Kerjasama</th>
                <th>Nilai Inisiatif</th>
                <th>Nilai Tanggung Jawab</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><input type="checkbox" name="selected_ids[]" value="<?php echo $row['id']; ?>"></td>
                    <td><?php echo htmlspecialchars($row['nisn']); ?></td>
                    <td><?php echo htmlspecialchars($row['nama_lengkap']); ?></td>
                    <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_mulai']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_selesai']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai_kerajinan']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai_disiplin']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai_kerjasama']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai_inisiatif']); ?></td>
                    <td><?php echo htmlspecialchars($row['nilai_tanggung_jawab']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <button type="submit">Cetak Sertifikat Terpilih</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
