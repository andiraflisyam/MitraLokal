<?php
session_start();
require 'koneksi.php';

// Cek jika pengguna sudah login
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silakan login untuk melihat riwayat transaksi.'); window.location.href='login.php';</script>";
    exit();
}

// Ambil ID transaksi dan pastikan itu angka
$transaksiID = isset($_GET['id']) ? intval($_GET['id']) : 0;
$username = $_SESSION['username'];

if ($transaksiID <= 0) {
    echo "<script>alert('ID Transaksi tidak valid.'); window.location.href='riwayat.php';</script>";
    exit();
}

// Ambil detail transaksi utama dengan prepared statement
$stmt = $conn->prepare("SELECT * FROM transaksi WHERE TransaksiID = ? AND username = ?");
$stmt->bind_param("is", $transaksiID, $username);
$stmt->execute();
$result = $stmt->get_result();
$transaksi = $result->fetch_assoc();
$stmt->close();

if (!$transaksi) {
    echo "<script>alert('Transaksi tidak ditemukan atau Anda tidak memiliki akses.'); window.location.href='riwayat.php';</script>";
    exit();
}

// Ambil detail produk dalam transaksi
$detail_items = [];
$stmt_detail = $conn->prepare("SELECT NamaProduk, JumlahProduk, SubHarga FROM detail_transaksi WHERE TransaksiID = ?");
$stmt_detail->bind_param("i", $transaksiID);
$stmt_detail->execute();
$detailResult = $stmt_detail->get_result();
while ($row = $detailResult->fetch_assoc()) {
    $detail_items[] = $row;
}
$stmt_detail->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi #<?php echo htmlspecialchars($transaksi['TransaksiID']); ?> - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Detail Transaksi</h2>
            <a href="riwayat.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        
        <div class="card">
            <div class="card-header fs-5">
                Nomor Pesanan: <strong>#<?php echo htmlspecialchars($transaksi['TransaksiID']); ?></strong>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h5>Ringkasan Pesanan</h5>
                        <p><strong>Tanggal Pesan:</strong> <?php echo date("d F Y, H:i", strtotime($transaksi['OrderDate'])); ?></p>
                        <p><strong>Total Pembayaran:</strong> <span class="fw-bold text-primary">Rp <?php echo number_format($transaksi['TotalHarga'], 0, ',', '.'); ?></span></p>
                        <p><strong>Status Pembayaran:</strong> <span class="badge bg-warning text-dark"><?php echo htmlspecialchars($transaksi['StatusPembayaran']); ?></span></p>
                        <p><strong>Metode Pembayaran:</strong> <?php echo htmlspecialchars($transaksi['MetodePembayaran']); ?></p>
                        <hr>
                        <h5>Alamat Pengiriman</h5>
                        <p><strong><?php echo htmlspecialchars($transaksi['NamaPembeli']); ?></strong><br>
                        <?php echo nl2br(htmlspecialchars($transaksi['AlamatPengiriman'])); ?><br>
                        <?php echo htmlspecialchars($transaksi['NoWhatsApp']); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Item yang Dipesan</h5>
                        <ul class="list-group">
                            <?php foreach ($detail_items as $item): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <?php echo htmlspecialchars($item['NamaProduk']); ?><br>
                                    <small class="text-muted">Jumlah: <?php echo htmlspecialchars($item['JumlahProduk']); ?></small>
                                </div>
                                <span>Rp <?php echo number_format($item['SubHarga'], 0, ',', '.'); ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <hr>
                        <h5>Upload Bukti Pembayaran</h5>
                        <?php if (!empty($transaksi['BuktiPembayaran'])): ?>
                            <p>Bukti pembayaran sudah diunggah.</p>
                            <a href="<?php echo htmlspecialchars($transaksi['BuktiPembayaran']); ?>" target="_blank">
                                <img src="<?php echo htmlspecialchars($transaksi['BuktiPembayaran']); ?>" alt="Bukti Pembayaran" class="img-fluid rounded" style="max-width: 200px;">
                            </a>
                        <?php else: ?>
                            <form action="upload_bukti.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="transaksi_id" value="<?php echo $transaksi['TransaksiID']; ?>">
                                <div class="mb-3">
                                    <input type="file" name="bukti_pembayaran" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Bukti</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>