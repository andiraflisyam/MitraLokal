<?php
session_start();
require 'koneksi.php';

// --- BAGIAN LOGIKA PHP ---
$detail = null;
$id_produk = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_produk > 0) {
    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT ProductID, NamaProduk, Harga, DeskripsiProduk, Stok, GambarProduk, kategori FROM produk WHERE ProductID = ?");
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();
    $detail = $result->fetch_assoc();
    $stmt->close();
}

// Proses form jika tombol 'beli' diklik
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["beli"])) {
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('Silakan login terlebih dahulu untuk berbelanja.'); window.location = 'login.php';</script>";
        exit();
    }
    
    $jumlah = isset($_POST["jumlah"]) ? intval($_POST["jumlah"]) : 0;
    
    if (!$detail) {
        echo "<script>alert('Produk tidak valid.');</script>";
    } elseif ($jumlah <= 0) {
        echo "<script>alert('Jumlah pesanan harus lebih dari 0.');</script>";
    } elseif ($jumlah > $detail["Stok"]) {
        echo "<script>alert('Maaf, jumlah pesanan melebihi stok yang tersedia.');</script>";
    } else {
        // Gunakan session 'keranjang'
        if (!isset($_SESSION["keranjang"])) {
            $_SESSION["keranjang"] = [];
        }

        // Tambahkan produk ke keranjang atau update jumlah
        if (isset($_SESSION["keranjang"][$id_produk])) {
            $_SESSION["keranjang"][$id_produk] += $jumlah;
        } else {
            $_SESSION["keranjang"][$id_produk] = $jumlah;
        }

        echo "<script>alert('Produk berhasil ditambahkan ke keranjang!'); window.location = 'cart.php';</script>";
        exit();
    }
}

// Jika produk tidak ditemukan, alihkan ke halaman lain atau tampilkan error
if (!$detail) {
    http_response_code(404);
    die("Produk tidak ditemukan.");
}
// --- AKHIR BAGIAN LOGIKA PHP ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($detail["NamaProduk"]); ?> - Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <style>
        .product-image { max-height: 500px; object-fit: cover; border-radius: 15px; }
        .stok-badge { font-size: 1rem; }
    </style>
</head>
<body>
<?php include 'navbar.php' ?>

<section class="konten py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <img src="admin/produk/<?php echo htmlspecialchars($detail['GambarProduk']); ?>" 
                     class="card-img-top img-fluid product-image shadow" 
                     alt="<?php echo htmlspecialchars($detail['NamaProduk']); ?>">
            </div>
            <div class="col-lg-6">
                <h2><?php echo htmlspecialchars($detail["NamaProduk"]); ?></h2>
                <p class="fs-4 text-primary fw-bold">Rp <?php echo number_format($detail["Harga"]); ?></p>
                
                <div class="d-flex align-items-center mb-3">
                    <span class="text-muted me-3">Kategori: <?php echo htmlspecialchars($detail["kategori"]); ?></span>
                    <?php if ($detail['Stok'] > 0): ?>
                        <span class="badge bg-success stok-badge">Stok Tersedia: <?php echo $detail["Stok"]; ?></span>
                    <?php else: ?>
                        <span class="badge bg-danger stok-badge">Stok Habis</span>
                    <?php endif; ?>
                </div>

                <p class="text-muted lh-lg"><?php echo nl2br(htmlspecialchars($detail["DeskripsiProduk"])); ?></p>

                <hr>

                <form method="POST" action="">
                    <div class="row align-items-center g-2">
                        <div class="col-md-4">
                            <label for="jumlah" class="form-label">Jumlah:</label>
                            <input type="number" id="jumlah" name="jumlah" 
                                   class="form-control" 
                                   min="1" max="<?php echo intval($detail['Stok']); ?>" 
                                   value="1" required <?php echo ($detail["Stok"] <= 0) ? 'disabled' : ''; ?>>
                        </div>
                        <div class="col-md-8">
                            <button class="btn btn-primary btn-lg w-100 mt-3 mt-md-0" 
                                    name="beli" 
                                    <?php echo ($detail["Stok"] <= 0) ? 'disabled' : ''; ?>>
                                <i class="fas fa-shopping-cart me-2"></i>Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </form>

                <div class="d-grid gap-2 mt-3">
                    <?php
                    $wa_message = "Halo, saya tertarik dengan produk '" . $detail["NamaProduk"] . "'. Apakah produk ini masih tersedia?";
                    ?>
                    <a href="https://wa.me/6281947707283?text=<?php echo urlencode($wa_message); ?>" 
                       class="btn btn-success" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i> Tanya via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>