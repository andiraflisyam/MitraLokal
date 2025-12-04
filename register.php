<?php
session_start();
require 'koneksi.php';

$error_message = '';

// Jika pengguna sudah login, alihkan ke halaman utama
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['register'])) {
    // 1. Ambil dan bersihkan input
    $nama = trim($_POST['nama']);
    $username = trim($_POST['username']);
    $password = $_POST['password']; // Tidak perlu di-trim
    $nomor_telpon = trim($_POST['nomor_telpon']);
    $alamat = trim($_POST['alamat']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $peran = 'user';

    // 2. Validasi dasar
    if (empty($nama) || empty($username) || empty($password) || empty($nomor_telpon) || empty($alamat) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Semua kolom wajib diisi dan format email harus benar.";
    } elseif (strlen($password) < 6) {
        $error_message = "Password minimal harus 6 karakter.";
    } else {
        // 3. Cek apakah username atau email sudah ada (Prepared Statement)
        $stmt = $conn->prepare("SELECT UserID FROM user WHERE username = ? OR Email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = "Username atau Email sudah terdaftar. Silakan gunakan yang lain.";
        } else {
            // 4. Jika aman, hash password dan masukkan ke database (Prepared Statement)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt_insert = $conn->prepare("INSERT INTO user (Nama, username, password, Nomor_Telpon, Alamat, Email, Peran) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt_insert->bind_param("sssssss", $nama, $username, $hashed_password, $nomor_telpon, $alamat, $email, $peran);

            if ($stmt_insert->execute()) {
                // Registrasi berhasil, alihkan ke halaman login dengan pesan sukses
                $_SESSION['register_success'] = "Registrasi berhasil! Silakan login dengan akun Anda.";
                header("Location: login.php");
                exit();
            } else {
                $error_message = "Registrasi gagal. Terjadi kesalahan pada server.";
            }
            $stmt_insert->close();
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Arial', sans-serif; }
        .register-container { max-width: 450px; margin: 5vh auto; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        .form-control { border-radius: 8px; }
    </style>
</head>
<body>
    <div class="register-container p-4 p-md-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Buat Akun Baru</h2>
            <p class="text-muted">Daftar untuk mulai berbelanja di Lily Galeri.</p>
        </div>
        
        <?php if ($error_message): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="register.php">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nomor_telpon" class="form-label">Nomor WhatsApp</label>
                <input type="text" name="nomor_telpon" id="nomor_telpon" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea name="alamat" id="alamat" class="form-control" required rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary w-100 py-2">Register</button>
        </form>
        <div class="text-center mt-3">
            <p class="text-muted">Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>
    </div>
</body>
</html>
