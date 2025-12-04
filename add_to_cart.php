<?php
session_start();
require "koneksi.php";

// Pastikan product_id ada dan merupakan angka
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$quantity = 1; // Default jumlah

if ($product_id > 0) {
    // 1. Cek stok produk terlebih dahulu
    $stmt = $conn->prepare("SELECT Stok FROM produk WHERE ProductID = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product && $product['Stok'] >= $quantity) {
        // 2. Inisialisasi keranjang jika belum ada
        if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = [];
        }

        // 3. Tambahkan produk ke keranjang
        if (isset($_SESSION['keranjang'][$product_id])) {
            $_SESSION['keranjang'][$product_id] += $quantity;
        } else {
            $_SESSION['keranjang'][$product_id] = $quantity;
        }

        // Opsional: Beri pesan sukses
        // $_SESSION['pesan_sukses'] = "Produk berhasil ditambahkan ke keranjang!";

    } else {
        // Opsional: Beri pesan error jika stok habis
        // $_SESSION['pesan_error'] = "Maaf, stok produk tidak mencukupi.";
    }
    $stmt->close();
}

// Kembali ke halaman sebelumnya atau halaman katalog
header("Location: katalog.php");
exit;