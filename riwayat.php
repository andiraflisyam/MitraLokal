<?php
session_start();
require 'koneksi.php';

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// --- BAGIAN LOGIKA: Ambil semua data transaksi terlebih dahulu ---
$username = $_SESSION['username'];
$daftar_transaksi = [];

// Gunakan prepared statement untuk mengambil data dengan aman
$stmt = $conn->prepare("SELECT TransaksiID, OrderDate, TotalHarga, MetodePembayaran, StatusPembayaran FROM transaksi WHERE username = ? ORDER BY OrderDate DESC");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $daftar_transaksi[] = $row;
}
$stmt->close();
// --- AKHIR BAGIAN LOGIKA ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Lily Galeri</title>
    <!-- Gunakan CSS Profesional yang sudah kita buat -->
    <link rel="stylesheet" href="style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <style>
        .status-badge { font-size: 0.9em; padding: .5em .75em; }
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div class="container section-padding">
        <h2 class="text-center mb-5">Riwayat Belanja Saya</h2>

        <?php if (!empty($daftar_transaksi)): ?>
            <div class="table-responsive shadow-sm bg-white rounded p-3">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="table-light">
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($daftar_transaksi as $transaksi): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo date("d M Y, H:i", strtotime($transaksi['OrderDate'])); ?></td>
                                <td>Rp <?php echo number_format($transaksi['TotalHarga'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php
                                    $status = htmlspecialchars($transaksi['StatusPembayaran']);
                                    $badge_class = 'bg-secondary'; // Default
                                    if ($status == 'Dibayar' || $status == 'Berhasil' || $status == 'Diverifikasi') $badge_class = 'bg-success';
                                    if ($status == 'Belum Dibayar') $badge_class = 'bg-warning text-dark';
                                    if ($status == 'Gagal') $badge_class = 'bg-danger';
                                    ?>
                                    <span class="badge <?php echo $badge_class; ?> status-badge"><?php echo $status; ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="detail_transaksi.php?id=<?php echo $transaksi['TransaksiID']; ?>" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <?php if ($status == 'Berhasil' || $status == 'Dibayar'): ?>
                                        <a href="nota.php?id=<?php echo $transaksi['TransaksiID']; ?>" class="btn btn-outline-secondary btn-sm">
                                            <i class="bi bi-receipt"></i> Nota
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5 border rounded bg-light">
                <i class="bi bi-cart-x" style="font-size: 3rem; color: #ccc;"></i>
                <h4 class="mt-3">Anda Belum Memiliki Riwayat Transaksi</h4>
                <p class="text-muted">Ayo mulai berbelanja untuk melihat transaksimu di sini.</p>
                <a href="katalog.php" class="btn btn-primary mt-2">Mulai Belanja</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
