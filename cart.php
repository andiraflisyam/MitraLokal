<?php
session_start();
require "koneksi.php";

$keranjang = $_SESSION['keranjang'] ?? [];
$total = 0;
$item_keranjang = [];

if (!empty($keranjang)) {
    // Ambil semua product ID dari keranjang
    $product_ids = array_keys($keranjang);
    $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
    $types = str_repeat('i', count($product_ids));

    // Ambil semua data produk dalam satu query untuk efisiensi
    $stmt = $conn->prepare("SELECT ProductID, NamaProduk, Harga, GambarProduk FROM produk WHERE ProductID IN ($placeholders)");
    $stmt->bind_param($types, ...$product_ids);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($product = $result->fetch_assoc()) {
        $product_id = $product['ProductID'];
        $quantity = $keranjang[$product_id];
        $subtotal = $product['Harga'] * $quantity;
        $total += $subtotal;

        $item_keranjang[] = [
            'id' => $product_id,
            'nama' => $product['NamaProduk'],
            'harga' => $product['Harga'],
            'gambar' => $product['GambarProduk'],
            'jumlah' => $quantity,
            'subtotal' => $subtotal
        ];
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container my-5">
        <h2 class="text-center mb-4">Keranjang Belanja Anda</h2>

        <?php if (!empty($item_keranjang)): ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" colspan="2">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col" class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($item_keranjang as $item): ?>
                            <tr>
                                <td style="width: 100px;">
                                    <img src="admin/produk/<?php echo htmlspecialchars($item['gambar']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($item['nama']); ?>">
                                </td>
                                <td><?php echo htmlspecialchars($item['nama']); ?></td>
                                <td>Rp<?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                                <td><?php echo $item['jumlah']; ?></td>
                                <td class="text-end">Rp<?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="table-light">
                            <td colspan="4" class="text-end fs-5"><strong>Total Belanja:</strong></td>
                            <td class="text-end fs-5"><strong>Rp<?php echo number_format($total, 0, ',', '.'); ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="katalog.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Lanjut Belanja</a>
                <a href="checkout.php" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Lanjut ke Checkout</a>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="fas fa-shopping-basket fa-4x text-muted mb-3"></i>
                <h3>Keranjang Anda Kosong</h3>
                <p class="text-muted">Sepertinya Anda belum menambahkan produk apapun.</p>
                <a href="katalog.php" class="btn btn-primary mt-2">Mulai Belanja</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>