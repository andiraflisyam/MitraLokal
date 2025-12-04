<?php
session_start();

// Pastikan ID produk ada dan merupakan angka
$id_produk = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id_produk > 0) {
    // Gunakan 'keranjang' secara konsisten
    if (isset($_SESSION["keranjang"][$id_produk])) {
        unset($_SESSION["keranjang"][$id_produk]);
        // Beri pesan sukses (opsional)
        // $_SESSION['pesan_sukses'] = "Item berhasil dihapus dari keranjang.";
    }
}

// Kembali ke halaman keranjang
header("Location: keranjang.php");
exit();
