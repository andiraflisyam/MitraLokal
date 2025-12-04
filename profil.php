<?php
session_start();
require 'koneksi.php';

// Jika pengguna belum login, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Ambil data terbaru pengguna dari database
$stmt = $conn->prepare("SELECT Nama, Nomor_Telpon, Alamat, Email FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();
$stmt->close();

if (!$user_data) {
    // Jika data tidak ditemukan (kasus langka), logout dan redirect
    session_destroy();
    header("Location: login.php");
    exit();
}

$name = $user_data['Nama'];
$phone = $user_data['Nomor_Telpon'];
$address = $user_data['Alamat'];
$email = $user_data['Email'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container my-5">
        <h2 class="mb-4 text-center">Profil Saya</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <strong>Nama:</strong>
                            <p class="text-muted"><?php echo htmlspecialchars($name); ?></p>
                        </div>
                        <div class="mb-3">
                            <strong>Username:</strong>
                            <p class="text-muted"><?php echo htmlspecialchars($username); ?></p>
                        </div>
                        <div class="mb-3">
                            <strong>Nomor WhatsApp:</strong>
                            <p class="text-muted"><?php echo htmlspecialchars($phone); ?></p>
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <p class="text-muted"><?php echo htmlspecialchars($email); ?></p>
                        </div>
                        <div class="mb-3">
                            <strong>Alamat:</strong>
                            <p class="text-muted"><?php echo nl2br(htmlspecialchars($address)); ?></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="riwayat.php" class="btn btn-secondary">Riwayat Belanja</a>
                            <a href="edit_profile.php" class="btn btn-primary">Edit Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
