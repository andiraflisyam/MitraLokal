<?php
session_start();
require 'koneksi.php';
error_reporting(E_ERROR | E_PARSE);

// --- BAGIAN LOGIKA ---

// 1. Tentukan Kategori yang Aktif
$kategori_aktif = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// 2. Siapkan Query Dasar
$sql = "SELECT ProductID, NamaProduk, DeskripsiProduk, Harga, GambarProduk, kategori FROM produk";
$params = [];
$types = "";

// 3. Tambahkan Filter Kategori jika ada (Menggunakan Prepared Statement)
if (!empty($kategori_aktif)) {
    $sql .= " WHERE kategori = ?";
    $params[] = $kategori_aktif;
    $types .= "s";
}

// 4. Tambahkan Urutan
$sql .= " ORDER BY ProductID DESC";

// 5. Eksekusi Query dengan Aman
$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$produk_list = [];
while ($row = $result->fetch_assoc()) {
    $produk_list[] = $row;
}
$stmt->close();

// Fungsi untuk menghitung jumlah produk per kategori
function get_category_count($conn, $category_name = '') {
    if (empty($category_name)) {
        $sql = "SELECT COUNT(*) as total FROM produk";
        $result = $conn->query($sql);
        return $result->fetch_assoc()['total'];
    } else {
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM produk WHERE kategori = ?");
        $stmt->bind_param("s", $category_name);
        $stmt->execute();
        $count = $stmt->get_result()->fetch_assoc()['total'];
        $stmt->close();
        return $count;
    }
}

$count_semua = get_category_count($conn);
$count_wire = get_category_count($conn, 'Wire Weaving jewelry');
$count_embroidery = get_category_count($conn, 'Embroidery jewelry');

// --- AKHIR BAGIAN LOGIKA ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <style>
        body { background-color: whitesmoke; }
        .content-box { background: rgba(255, 230, 230, 0.9); padding: 2rem; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .card { transition: transform 0.2s ease, box-shadow 0.2s ease; border: none; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 8px 16px rgba(0,0,0,0.15); }
        .fixed-image { width: 100%; height: 250px; object-fit: cover; }
        .filter-btn.active { font-weight: bold; border-bottom: 2px solid #0d6efd; color: #0d6efd !important; background-color: transparent !important; }
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>

    <div id="katalog" class="container my-5">
        <h2 class="text-center mb-4">Katalog Produk</h2>

        <!-- Filter Buttons -->
        <div class="text-center mb-4">
            <a href="katalog.php" class="btn btn-light filter-btn <?php echo ($kategori_aktif == '') ? 'active' : ''; ?>">
                Semua (<?php echo $count_semua; ?>)
            </a>
            <a href="katalog.php?kategori=Wire Weaving jewelry" class="btn btn-light filter-btn <?php echo ($kategori_aktif == 'Wire Weaving jewelry') ? 'active' : ''; ?>">
                Wire Weaving (<?php echo $count_wire; ?>)
            </a>
            <a href="katalog.php?kategori=Embroidery jewelry" class="btn btn-light filter-btn <?php echo ($kategori_aktif == 'Embroidery jewelry') ? 'active' : ''; ?>">
                Embroidery (<?php echo $count_embroidery; ?>)
            </a>
        </div>

        <div class="content-box">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php if (!empty($produk_list)): ?>
                    <?php foreach ($produk_list as $produk): ?>
                        <div class="col">
                            <a href="detail.php?id=<?php echo $produk['ProductID']; ?>" class="text-decoration-none text-dark">
                                <div class="card h-100 shadow-sm overflow-hidden">
                                    <img src="admin/produk/<?php echo htmlspecialchars($produk['GambarProduk']); ?>" class="fixed-image" alt="<?php echo htmlspecialchars($produk['NamaProduk']); ?>">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?php echo htmlspecialchars($produk['NamaProduk']); ?></h5>
                                        <p class="card-text text-muted">Rp <?php echo number_format($produk['Harga']); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p class="text-center text-muted py-5">Tidak ada produk yang ditemukan untuk kategori ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
