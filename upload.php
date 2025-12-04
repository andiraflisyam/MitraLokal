<?php
session_start();
require 'koneksi.php';

// Cek jika pengguna sudah login
if (!isset($_SESSION['username'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil data dari sesi dan form
    $namaPemesan = $_SESSION['name'] ?? 'Tidak diketahui';
    $noWhatsApp = $_SESSION['phone'] ?? 'Tidak tersedia';
    $alamatPengiriman = $_SESSION['address'] ?? 'Tidak tersedia';
    
    $jenisAksesoris = trim($_POST['jenisAksesoris']);
    $desain = trim($_POST['desain']);
    $material = trim($_POST['material']);
    $linkMaps = trim($_POST['linkMaps']) ?: 'Tidak disediakan';

    $namaFileFoto = null;

    // 2. Handle file upload dengan aman
    if (isset($_FILES['photoReferensi']) && $_FILES['photoReferensi']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['photoReferensi'];
        $uploadDirectory = 'uploads/preorder/';
        
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if ($file['size'] > 5242880) { // 5 MB
            die("Error: Ukuran file terlalu besar. Maksimal 5MB.");
        }
        if (!in_array($file['type'], $allowedTypes)) {
            die("Error: Format file tidak valid. Hanya JPG, PNG, GIF yang diizinkan.");
        }

        $namaFileFoto = uniqid('ref_') . '_' . time() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $filePath = $uploadDirectory . $namaFileFoto;

        if (!move_uploaded_file($file['tmp_name'], $filePath)) {
            die("Error: Gagal mengunggah file referensi.");
        }
    }

    // 3. Simpan data pre-order ke database (Prepared Statement)
    $stmt = $conn->prepare(
        "INSERT INTO customorder (NamaPemesan, Desain, MaterialTambahan, FotoReferensi, AlamatPengiriman, NoWhatsApp, StatusCustom) 
         VALUES (?, ?, ?, ?, ?, ?, 'Pending')"
    );
    $stmt->bind_param("ssssss", $namaPemesan, $desain, $material, $namaFileFoto, $alamatPengiriman, $noWhatsApp);
    
    if (!$stmt->execute()) {
        die("Error: Gagal menyimpan data pre-order ke database. " . $stmt->error);
    }
    $stmt->close();

    // 4. Siapkan pesan WhatsApp
    $photoURL = $namaFileFoto ? "https://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $filePath : 'Tidak ada';
    
    $message = "Halo Admin Lily Galeri,\n\n" .
               "Saya ingin melakukan pre-order dengan rincian berikut:\n\n" .
               "Nama: " . $namaPemesan . "\n" .
               "No. WA: " . $noWhatsApp . "\n" .
               "Jenis: " . $jenisAksesoris . "\n" .
               "Desain: " . $desain . "\n" .
               "Material: " . $material . "\n" .
               "Alamat: " . $alamatPengiriman . "\n" .
               "Foto Ref: " . $photoURL . "\n\n" .
               "Terima kasih.";

    $waNumber = "62811445052"; // Nomor WA Admin

    // 5. Redirect ke WhatsApp
    header("Location: https://api.whatsapp.com/send?phone=" . $waNumber . "&text=" . urlencode($message));
    exit();
}
