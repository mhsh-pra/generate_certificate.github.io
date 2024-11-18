<?php
session_start();

// Memastikan pengguna yang login adalah admin atau user
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role']; // Ambil role dari session
} else {
    $role = null; // Jika tidak ada session, maka role null
}


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile | E-CeC</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">E-CeC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="company_profile.php">Company Profile</a>
                    </li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item">
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                                <a class="nav-link" href="dashboard_admin.php">Dashboard</a>
                            <?php elseif ($_SESSION['role'] == 'user'): ?>
                                <a class="nav-link" href="dashboard_user.php">Dashboard</a>
                            <?php endif; ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Company Profile Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Tentang Kami</h2>
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="background.jpg" class="img-fluid" alt="Tentang Kami">
                </div>
                <div class="col-md-6">
                    <p>E-CeC adalah perusahaan yang bergerak dalam bidang pembuatan sertifikat kustom untuk acara event. Kami memudahkan proses pembuatan, pengelolaan, dan pengiriman sertifikat kepada peserta acara secara otomatis. Layanan kami digunakan oleh berbagai jenis event dari skala kecil hingga besar, mulai dari seminar, workshop, hingga konferensi internasional.</p>
                    <p><strong>VISI</strong> kami Menjadi penyedia utama solusi sertifikat yang inovatif dan terpersonalisasi untuk berbagai acara, di mana setiap sertifikat tidak hanya menjadi pengakuan prestasi tetapi juga karya seni yang berharga. Kami berkomitmen untuk meningkatkan pengalaman acara dengan desain yang elegan dan fungsional, memastikan bahwa setiap momen yang dirayakan diabadikan dengan cara yang tak terlupakan.</p>
                    <p><strong>MISI</strong> Kami Menyediakan Kualitas Terbaik, Kami berkomitmen untuk menciptakan sertifikat yang berkualitas tinggi dengan desain yang menarik dan profesional, menggunakan teknologi terkini untuk menghasilkan produk yang dapat diandalkan. Personalisasi yang Fleksibel: Kami memahami bahwa setiap acara unik. Oleh karena itu, kami menawarkan layanan kustomisasi yang memungkinkan klien untuk menambahkan sentuhan pribadi, mulai dari desain hingga teks, agar sertifikat mencerminkan identitas acara mereka.</p>
                </div>
            </div>

            <!-- Deskripsi Project -->
            <h3 class="text-center mb-4">Deskripsi Project</h3>
            <p class="text-center"><b>E-CeC</b> bertujuan untuk membuat proses pembuatan sertifikat menjadi semudah mungkin, namun tetap memberikan fleksibilitas penuh untuk menghasilkan sertifikat berkualitas tinggi yang personal dan profesional, sesuai dengan kebutuhan unik setiap acara. Dengan platform kami, penyelenggara acara tidak lagi perlu khawatir tentang proses manual yang memakan waktu dalam mendesain dan mendistribusikan sertifikat—kami membantu mereka fokus pada hal-hal penting lainnya dalam menyelenggarakan acara.</p>

            <!-- Team Section -->
            <h3 class="text-center mb-4">Anggota Tim</h3>
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="gambar.jpeg" class="rounded-circle mb-3" alt="Andhika Mahesh">
                    <h5>Andhika Mahesh</h5>
                    <p>Desainer Sertifikat</p>
                    <div class="social-icons">
                        <a href="https://github.com/mhsh-pra" target="_blank">
                            <img src="assets/icons/github.svg" alt="github" width="30">
                        </a>
                        <a href="https://www.instagram.com/mhsh.pra_/profilecard/?igsh=YzNlMTdkbW5tMm02" target="_blank">
                            <img src="assets/icons/instagram.svg" alt="Instagram" width="30">
                        </a>
                        <a href="https://www.tiktok.com/@mhsh.pra?_t=8qabmvmKMKY&_r=1" target="_blank">
                            <img src="assets/icons/tiktok.svg" alt="tiktok" width="30">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="gambar.JPG" class="rounded-circle mb-3" alt="Fickry Alfianto">
                    <h5>Fickry Alfianto</h5>
                    <p>Pengembang Web</p>
                    <div class="social-icons">
                        <a href="https://github.com/Orcusss777" target="_blank">
                            <img src="assets/icons/github.svg" alt="github" width="30">
                        </a>
                        <a href="https://www.instagram.com/_yrkcif/profilecard/?igsh=eTh1aWdpcnBvNng2" target="_blank">
                            <img src="assets/icons/instagram.svg" alt="Instagram" width="30">
                        </a>
                        <a href="https://www.tiktok.com/@yrkcif?_t=8qabne2Jpay&_r=1" target="_blank">
                            <img src="assets/icons/tiktok.svg" alt="tiktok" width="30">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="gambar.jpeg" class="rounded-circle mb-3" alt="Chairil Gibran">
                    <h5>Chairil Gibran</h5>
                    <p>Desainer Grafis</p>
                    <div class="social-icons">
                        <a href="https://github.com/1dlebraan" target="_blank">
                            <img src="assets/icons/github.svg" alt="github" width="30">
                        </a>
                        <a href="https://www.instagram.com/1dlebraan_/profilecard/?igsh=N3Fha2ptYWNpcDR5" target="_blank">
                            <img src="assets/icons/instagram.svg" alt="Instagram" width="30">
                        </a>
                        <a href="https://www.tiktok.com/@sp1cetfy?_t=8qabRNkyCtb&_r=1" target="_blank">
                            <img src="assets/icons/tiktok.svg" alt="tiktok" width="30">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kontak Kami -->
            <h3 class="text-center my-4">Kontak Kami</h3>
            <p class="text-center my-4"><b>For more info please Contact Us!</b></p>
            <div class="text-start">
                <h2><strong>Our Office</strong></h2>
                <p><strong>Email:</strong> info@ecec.com</p>
                <p><strong>Telepon:</strong> +62 812-3456-7890</p>
                <p><strong>Alamat:</strong> Jl. Merdeka No.123, Jakarta, Indonesia</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 E-CeC. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
