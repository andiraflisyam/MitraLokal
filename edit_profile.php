<?php
session_start();
require 'koneksi.php';

// Cek jika pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$pesan_update = '';
$pesan_password = '';

// --- PERBAIKAN: Menggunakan nama kolom database yang benar ---

// Proses update profil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $name = trim($_POST['nama']); // Menggunakan 'nama' dari form
    $phone = trim($_POST['nomor_telpon']); // Menggunakan 'nomor_telpon' dari form
    $address = trim($_POST['alamat']); // Menggunakan 'alamat' dari form
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

    if ($name && $phone && $address && $email) {
        $stmt = $conn->prepare("UPDATE user SET Nama = ?, Nomor_Telpon = ?, Alamat = ?, Email = ? WHERE username = ?");
        $stmt->bind_param("sssss", $name, $phone, $address, $email, $username);
        
        if ($stmt->execute()) {
            // Update session agar data di navbar ikut berubah
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            $_SESSION['email'] = $email;
            $pesan_update = "Profil berhasil diperbarui!";
        } else {
            $pesan_update = "Gagal memperbarui profil. Coba lagi.";
        }
        $stmt->close();
    } else {
        $pesan_update = "Semua kolom profil wajib diisi dan email harus valid.";
    }
}

// Proses ganti password (sudah aman, tidak perlu perubahan)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $stmt_pass = $conn->prepare("SELECT password FROM user WHERE username = ?");
    $stmt_pass->bind_param("s", $username);
    $stmt_pass->execute();
    $user = $stmt_pass->get_result()->fetch_assoc();
    $stmt_pass->close();

    if ($user && password_verify($old_password, $user['password'])) {
        if (strlen($new_password) >= 6) {
            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt_update = $conn->prepare("UPDATE user SET password = ? WHERE username = ?");
                $stmt_update->bind_param("ss", $hashed_password, $username);
                if ($stmt_update->execute()) {
                    $pesan_password = "Password berhasil diperbarui!";
                } else {
                    $pesan_password = "Terjadi kesalahan saat update password.";
                }
                $stmt_update->close();
            } else {
                $pesan_password = "Password baru dan konfirmasi tidak cocok.";
            }
        } else {
            $pesan_password = "Password baru minimal harus 6 karakter.";
        }
    } else {
        $pesan_password = "Password lama salah.";
    }
}

// Ambil data terbaru untuk ditampilkan di form
$stmt_get = $conn->prepare("SELECT Nama, Nomor_Telpon, Alamat, Email FROM user WHERE username = ?");
$stmt_get->bind_param("s", $username);
$stmt_get->execute();
$current_user = $stmt_get->get_result()->fetch_assoc();
$stmt_get->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container my-5">
        <h2 class="mb-4 text-center">Edit Profil Anda</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Form Edit Profil -->
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4>Informasi Akun</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($pesan_update): ?>
                            <div class="alert alert-info"><?php echo $pesan_update; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($current_user['Nama']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_telpon" class="form-label">Nomor WhatsApp</label>
                                <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon" value="<?php echo htmlspecialchars($current_user['Nomor_Telpon']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo htmlspecialchars($current_user['Alamat']); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($current_user['Email']); ?>" required>
                            </div>
                            <button type="submit" name="update_profile" class="btn btn-primary">Perbarui Profil</button>
                        </form>
                    </div>
                </div>

                <!-- Form Ganti Password -->
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h4>Ganti Password</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($pesan_password): ?>
                            <div class="alert alert-info"><?php echo $pesan_password; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="old_password" class="form-label">Password Lama</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <button type="submit" name="change_password" class="btn btn-primary">Ganti Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
