<?php
session_start();
require 'koneksi.php';

// 1. Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Silakan login terlebih dahulu untuk melanjutkan.'); window.location.href='login.php';</script>";
    exit();
}

// 2. Cek apakah keranjang kosong
if (empty($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang belanja Anda kosong.'); window.location.href='katalog.php';</script>";
    exit();
}

// 3. Ambil informasi pengguna dari session
$username = $_SESSION['username'];

// Ambil data terbaru dari database untuk ditampilkan
// =================== PERBAIKAN DI SINI ===================
// Menggunakan nama kolom yang benar: Nama, Alamat, Nomor_Telpon, Email
$stmt_user = $conn->prepare("SELECT Nama, Alamat, Nomor_Telpon, Email FROM user WHERE username = ?");
$stmt_user->bind_param("s", $username);
$stmt_user->execute();
$user_data = $stmt_user->get_result()->fetch_assoc();
$stmt_user->close();

if (!$user_data) {
    // Jika data pengguna tidak ditemukan, cegah error
    die("Gagal mengambil data pengguna. Silakan coba login ulang.");
}

// Menggunakan key array yang benar sesuai nama kolom
$namaPembeli = $user_data['Nama'];
$alamatPengiriman = $user_data['Alamat'];
$noWhatsApp = $user_data['Nomor_Telpon'];
$email = $user_data['Email'];
// =======================================================

// 4. Proses form checkout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $conn->begin_transaction(); // Mulai transaksi untuk menjaga integritas data

    try {
        $metodePembayaran = trim($_POST['MetodePembayaran']);
        $alamatPengirimanInput = trim($_POST['AlamatPengiriman']);
        $statusPembayaran = "Belum Dibayar";
        $orderDate = date("Y-m-d H:i:s");
        
        if (empty($metodePembayaran) || empty($alamatPengirimanInput)) {
            throw new Exception("Metode pembayaran dan alamat pengiriman wajib diisi.");
        }

        // Hitung total harga dan validasi stok
        $totalHarga = 0;
        $items_to_check = $_SESSION['keranjang'];
        $product_ids = array_keys($items_to_check);
        $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
        $types = str_repeat('i', count($product_ids));

        $stmt_check = $conn->prepare("SELECT ProductID, NamaProduk, Harga, Stok FROM produk WHERE ProductID IN ($placeholders)");
        $stmt_check->bind_param($types, ...$product_ids);
        $stmt_check->execute();
        $products_result = $stmt_check->get_result();
        $db_products = [];
        while($row = $products_result->fetch_assoc()){
            $db_products[$row['ProductID']] = $row;
        }
        $stmt_check->close();
        
        foreach ($items_to_check as $id_produk => $jumlah) {
            if (!isset($db_products[$id_produk])) throw new Exception("Produk dengan ID $id_produk tidak ditemukan.");
            $produk = $db_products[$id_produk];
            if ($produk['Stok'] < $jumlah) throw new Exception("Stok produk '" . $produk['NamaProduk'] . "' tidak mencukupi.");
            $totalHarga += $produk['Harga'] * $jumlah;
        }

        // Masukkan ke tabel transaksi
        $stmt_trans = $conn->prepare("INSERT INTO transaksi (OrderDate, TotalHarga, MetodePembayaran, StatusPembayaran, NamaPembeli, AlamatPengiriman, NoWhatsApp, EmailPembeli, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt_trans->bind_param("sdsssssss", $orderDate, $totalHarga, $metodePembayaran, $statusPembayaran, $namaPembeli, $alamatPengirimanInput, $noWhatsApp, $email, $username);
        $stmt_trans->execute();
        $transaksiID = $stmt_trans->insert_id;
        $stmt_trans->close();

        // Masukkan ke tabel detail_transaksi dan update stok
        $stmt_detail = $conn->prepare("INSERT INTO detail_transaksi (TransaksiID, ProdukID, NamaProduk, JumlahProduk, SubHarga) VALUES (?, ?, ?, ?, ?)");
        $stmt_update_stok = $conn->prepare("UPDATE produk SET Stok = Stok - ? WHERE ProductID = ?");

        foreach ($items_to_check as $id_produk => $jumlah) {
            $produk = $db_products[$id_produk];
            $subharga = $produk['Harga'] * $jumlah;
            $namaProduk = $produk['NamaProduk'];
            
            $stmt_detail->bind_param("iisid", $transaksiID, $id_produk, $namaProduk, $jumlah, $subharga);
            $stmt_detail->execute();

            $stmt_update_stok->bind_param("ii", $jumlah, $id_produk);
            $stmt_update_stok->execute();
        }
        $stmt_detail->close();
        $stmt_update_stok->close();
        
        $conn->commit();

        unset($_SESSION['keranjang']);

        echo "<script>alert('Checkout berhasil! Silakan selesaikan pembayaran Anda.'); window.location.href='riwayat.php';</script>";
        exit();

    } catch (Exception $e) {
        $conn->rollback();
        echo "<script>alert('Terjadi kesalahan: " . addslashes($e->getMessage()) . "'); window.history.back();</script>";
        exit();
    }
}

// Ambil data untuk ditampilkan di halaman
$totalHargaDisplay = 0;
$item_keranjang_display = [];
$product_ids_display = array_keys($_SESSION['keranjang']);
$placeholders_display = implode(',', array_fill(0, count($product_ids_display), '?'));
$types_display = str_repeat('i', count($product_ids_display));

$stmt_display = $conn->prepare("SELECT ProductID, NamaProduk, Harga FROM produk WHERE ProductID IN ($placeholders_display)");
$stmt_display->bind_param($types_display, ...$product_ids_display);
$stmt_display->execute();
$result_display = $stmt_display->get_result();
while ($produk = $result_display->fetch_assoc()) {
    $jumlah = $_SESSION['keranjang'][$produk['ProductID']];
    $subharga = $produk['Harga'] * $jumlah;
    $totalHargaDisplay += $subharga;
    $item_keranjang_display[] = ['nama' => $produk['NamaProduk'], 'jumlah' => $jumlah, 'subharga' => $subharga];
}
$stmt_display->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <script>
        function togglePaymentDetails(method) {
            const transferDetails = document.getElementById('transferDetails');
            transferDetails.style.display = (method === 'Transfer Bank') ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container py-5">
        <h2 class="mb-4 text-center">🛒 Halaman Checkout</h2>
        <form method="POST" action="checkout.php">
            <div class="row g-5">
                <div class="col-md-7">
                    <h4 class="mb-3">Informasi Pengiriman</h4>
                    <div class="card p-4 shadow-sm">
                        <div class="mb-3">
                            <strong>Nama Penerima:</strong>
                            <p class="ms-2"><?php echo htmlspecialchars($namaPembeli); ?></p>
                        </div>
                        <div class="mb-3">
                            <strong>No. WhatsApp:</strong>
                            <p class="ms-2"><?php echo htmlspecialchars($noWhatsApp); ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="AlamatPengiriman" class="form-label"><strong>Alamat Pengiriman Lengkap</strong></label>
                            <textarea name="AlamatPengiriman" id="AlamatPengiriman" class="form-control" rows="4" required><?php echo htmlspecialchars($alamatPengiriman); ?></textarea>
                            <small class="form-text text-muted">Pastikan alamat sudah benar dan lengkap untuk memudahkan pengiriman.</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h4 class="mb-3">Ringkasan Pesanan</h4>
                    <div class="card p-4 shadow-sm">
                        <ul class="list-group list-group-flush mb-3">
                            <?php foreach ($item_keranjang_display as $item): ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?php echo htmlspecialchars($item['nama']); ?></h6>
                                    <small class="text-muted">Jumlah: <?php echo $item['jumlah']; ?></small>
                                </div>
                                <span class="text-muted">Rp<?php echo number_format($item['subharga']); ?></span>
                            </li>
                            <?php endforeach; ?>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <span class="fw-bold">Total (IDR)</span>
                                <strong class="text-primary">Rp<?php echo number_format($totalHargaDisplay); ?></strong>
                            </li>
                        </ul>
                        
                        <h5 class="mt-3">Metode Pembayaran</h5>
                        <div class="my-3">
                            <div class="form-check">
                                <input id="transfer" name="MetodePembayaran" type="radio" value="Transfer Bank" class="form-check-input" required onclick="togglePaymentDetails(this.value)">
                                <label class="form-check-label" for="transfer">Transfer Bank / QRIS</label>
                            </div>
                            <div class="form-check">
                                <input id="cod" name="MetodePembayaran" type="radio" value="COD" class="form-check-input" required onclick="togglePaymentDetails(this.value)">
                                <label class="form-check-label" for="cod">Cash on Delivery (COD)</label>
                            </div>
                        </div>

                        <div id="transferDetails" class="alert alert-info" style="display: none;">
                            <h5>Detail Pembayaran</h5>
                            <p class="mb-1">Silakan transfer ke rekening berikut:</p>
                            <p class="mb-1"><strong>Bank:</strong> Bank ABC</p>
                            <p class="mb-2"><strong>No. Rekening:</strong> 7377xxxxxxxx</p>
                            <p class="mb-1">Atau scan QRIS di bawah ini:</p>
                            <img src="assets/images/qris.jpg" alt="QRIS" class="img-fluid" style="max-width: 150px;">
                        </div>
                        
                        <button type="submit" name="checkout" class="btn btn-primary btn-lg w-100 mt-3">Buat Pesanan Sekarang</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
