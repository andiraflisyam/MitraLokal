<?php
session_start();
require 'koneksi.php';

// Cek login
if (!isset($_SESSION['username'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Validasi input
    $transaksi_id = isset($_POST['transaksi_id']) ? intval($_POST['transaksi_id']) : 0;
    if ($transaksi_id <= 0) {
        die("ID Transaksi tidak valid.");
    }
    if (!isset($_FILES['bukti_pembayaran']) || $_FILES['bukti_pembayaran']['error'] !== UPLOAD_ERR_OK) {
        echo "<script>alert('Anda harus memilih file bukti pembayaran.'); window.history.back();</script>";
        exit();
    }

    $username = $_SESSION['username'];
    $file = $_FILES['bukti_pembayaran'];

    // 2. Verifikasi kepemilikan transaksi
    $stmt_check = $conn->prepare("SELECT TransaksiID FROM transaksi WHERE TransaksiID = ? AND username = ?");
    $stmt_check->bind_param("is", $transaksi_id, $username);
    $stmt_check->execute();
    if ($stmt_check->get_result()->num_rows === 0) {
        die("Akses ditolak. Anda tidak memiliki izin untuk transaksi ini.");
    }
    $stmt_check->close();

    // 3. Proses upload file yang aman
    $target_dir = "uploads/bukti/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }
    
    // Validasi tipe dan ukuran file
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if ($file['size'] > 5242880) { // 5 MB
        echo "<script>alert('Ukuran file terlalu besar. Maksimal 5MB.'); window.history.back();</script>";
        exit();
    }
    if (!in_array(mime_content_type($file['tmp_name']), $allowedTypes)) {
        echo "<script>alert('Format file tidak valid. Hanya JPG, PNG, GIF yang diizinkan.'); window.history.back();</script>";
        exit();
    }

    // Buat nama file unik
    $file_name = 'bukti_' . $transaksi_id . '_' . time() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $target_file = $target_dir . $file_name;

    // 4. Pindahkan file dan update database
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        // Update database dengan prepared statement
        $status_pembayaran = 'Dibayar'; // Atau 'Menunggu Verifikasi'
        $stmt_update = $conn->prepare("UPDATE transaksi SET BuktiPembayaran = ?, StatusPembayaran = ? WHERE TransaksiID = ?");
        $stmt_update->bind_param("ssi", $target_file, $status_pembayaran, $transaksi_id);
        
        if ($stmt_update->execute()) {
            echo "<script>alert('Bukti pembayaran berhasil diunggah!'); window.location.href='riwayat.php';</script>";
        } else {
            unlink($target_file); // Hapus file jika query gagal
            echo "<script>alert('Gagal menyimpan data ke database.'); window.history.back();</script>";
        }
        $stmt_update->close();
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengunggah file.'); window.history.back();</script>";
    }
}
