<?php
session_start();
include 'db.php'; // Menghubungkan ke database

// Cek jika form register dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Role akan otomatis di-set ke 'user'
    $role = 'user';

    // Query untuk memasukkan data user ke database
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

    // Eksekusi dan cek apakah data berhasil disimpan
    if ($stmt->execute()) {
        header("Location: login.php"); // Redirect ke halaman login setelah sukses
        exit();
    } else {
        $error = "Terjadi kesalahan saat mendaftarkan akun. Silakan coba lagi.";
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
    <title>Register</title>
    <style>
        /* Style umum untuk body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Kontainer untuk form register */
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 10px;
        }

        .register-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Title Register */
        .register-box h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 2em;
        }

        /* Style untuk form dan input */
        form {
            width: 100%;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 1.1em;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Style tombol submit */
        button {
            width: 100%;
            padding: 12px;
            font-size: 1.1em;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        /* Style untuk link login */
        .login-link {
            margin-top: 20px;
        }

        .login-link p {
            font-size: 1em;
        }

        .login-link a {
            color: #007bff;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Menampilkan error message */
        .error {
            color: red;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        /* Responsif untuk perangkat kecil */
        @media (max-width: 600px) {
            .register-container {
                padding: 20px;
            }

            .register-box {
                padding: 20px;
                width: 100%;
                max-width: 90%;
            }

            button {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <h2>Register</h2>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <form action="register.php" method="post">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Register</button>
            </form>
            <div class="login-link">
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </div>
        </div>
    </div>
</body>
</html>
