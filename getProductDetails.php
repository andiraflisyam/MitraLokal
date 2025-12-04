<?php
header('Content-Type: application/json'); // Set header ke JSON
require 'koneksi.php';

$response = ['error' => 'Produk tidak ditemukan.'];
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    // KEAMANAN: Gunakan prepared statement untuk mencegah SQL Injection
    $stmt = $conn->prepare("SELECT ProductID, NamaProduk, DeskripsiProduk, Harga, GambarProduk, Stok, kategori FROM produk WHERE ProductID = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($product = $result->fetch_assoc()) {
        // Format harga dan path gambar sebelum dikirim
        $product['Harga_Format'] = 'Rp ' . number_format($product['Harga']);
        $product['GambarURL'] = 'admin/produk/' . htmlspecialchars($product['GambarProduk']);
        $response = $product;
    }
    $stmt->close();
}

echo json_encode($response);
