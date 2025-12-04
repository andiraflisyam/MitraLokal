<?php
session_start();
require 'koneksi.php';

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Validasi ID
$transaksi_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($transaksi_id <= 0) {
    echo "<script>alert('ID Transaksi tidak valid.'); window.location.href='riwayat.php';</script>";
    exit();
}

// Ambil data transaksi dengan aman
$stmt = $conn->prepare("SELECT * FROM transaksi WHERE TransaksiID = ? AND username = ?");
$stmt->bind_param("is", $transaksi_id, $_SESSION['username']);
$stmt->execute();
$result = $stmt->get_result();
$transaksi = $result->fetch_assoc();
$stmt->close();

if (!$transaksi) {
    echo "<script>alert('Transaksi tidak ditemukan atau Anda tidak memiliki akses.'); window.location.href='riwayat.php';</script>";
    exit();
}

// Ambil detail item transaksi
$stmt_items = $conn->prepare("SELECT NamaProduk, JumlahProduk, SubHarga FROM detail_transaksi WHERE TransaksiID = ?");
$stmt_items->bind_param("i", $transaksi_id);
$stmt_items->execute();
$items_result = $stmt_items->get_result();
$items = [];
while ($row = $items_result->fetch_assoc()) {
    $items[] = $row;
}
$stmt_items->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi #<?php echo htmlspecialchars($transaksi['TransaksiID']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            .nota-container { box-shadow: none !important; border: 1px solid #dee2e6; }
        }
        body { background-color: #f8f9fa; }
        .nota-container { max-width: 800px; margin: 2rem auto; background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="nota-container">
        <header class="text-center mb-4">
            <img src="assets/images/logolite1.png" alt="Logo" style="width: 80px;">
            <h2 class="mt-2">LILY GALERI</h2>
            <p class="text-muted">NTI, Jln. Manggis 4 Blok J No.3, Makassar</p>
        </header>

        <div class="row mb-4">
            <div class="col-6">
                <strong>Kepada:</strong>
                <p class="mb-0"><?php echo htmlspecialchars($transaksi['NamaPembeli']); ?></p>
                <p><?php echo nl2br(htmlspecialchars($transaksi['AlamatPengiriman'])); ?></p>
            </div>
            <div class="col-6 text-end">
                <strong>No. Pesanan:</strong> #<?php echo htmlspecialchars($transaksi['TransaksiID']); ?><br>
                <strong>Tanggal:</strong> <?php echo date("d F Y", strtotime($transaksi['OrderDate'])); ?>
            </div>
        </div>

        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Deskripsi</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-end">Harga</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['NamaProduk']); ?></td>
                    <td class="text-center"><?php echo $item['JumlahProduk']; ?></td>
                    <td class="text-end">Rp <?php echo number_format($item['SubHarga'] / $item['JumlahProduk']); ?></td>
                    <td class="text-end">Rp <?php echo number_format($item['SubHarga']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end border-0">Total</th>
                    <td class="text-end border-0 fs-5 fw-bold">Rp <?php echo number_format($transaksi['TotalHarga']); ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="mt-4">
            <p class="mb-1"><strong>Status:</strong> <?php echo htmlspecialchars($transaksi['StatusPembayaran']); ?></p>
            <p><strong>Metode Pembayaran:</strong> <?php echo htmlspecialchars($transaksi['MetodePembayaran']); ?></p>
        </div>

        <footer class="text-center mt-5">
            <p class="text-muted">Terima kasih telah berbelanja di Lily Galeri!</p>
        </footer>
    </div>

    <div class="container text-center mb-5 no-print">
         <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Nota</button>
         <a href="riwayat.php" class="btn btn-secondary">Kembali ke Riwayat</a>
    </div>
</body>
</html>
