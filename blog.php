<?php
require('koneksi.php');
error_reporting(E_ERROR | E_PARSE);

// --- BAGIAN LOGIKA PHP ---
$daftar_artikel = []; // Siapkan array kosong
$query_str = "SELECT id, judul, gambar, deskripsi FROM blog ORDER BY id DESC";
$result = mysqli_query($conn, $query_str);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $daftar_artikel[] = $row; // Masukkan setiap baris data ke array
    }
} else {
    // Opsional: catat error jika query gagal
    // error_log("Query blog gagal: " . mysqli_error($conn));
}
// --- AKHIR BAGIAN LOGIKA PHP ---
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <style>
        body { background-color: whitesmoke; }
        .content-box { background: rgba(255, 230, 230, 0.9); padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin: 10px 0; }
        .heading-black { color: #4A4A4A; font-size: 30px; }
        .card { border: none; transition: transform 0.2s ease-in-out; }
        .card:hover { transform: translateY(-5px); }
        .blog-thumbnail { width: 100%; height: 200px; object-fit: cover; }
        .btn-primary { background-color: #007bff; border: none; }
        .btn-primary:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container my-5">
        <h2 class="text-center mb-4 heading-black">Blog & Inspirasi</h2>
        <div class="content-box">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php if (!empty($daftar_artikel)): ?>
                    <?php foreach ($daftar_artikel as $artikel): ?>
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                <img src="admin/blog/<?php echo htmlspecialchars($artikel['gambar']); ?>" class="blog-thumbnail" alt="<?php echo htmlspecialchars($artikel['judul']); ?>">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php echo htmlspecialchars($artikel['judul']); ?></h5>
                                    <p class="card-text text-muted"><?php echo htmlspecialchars($artikel['deskripsi']); ?></p>
                                    <a href="blog_detail.php?id=<?php echo $artikel['id']; ?>" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class='col-12'>
                        <p class='text-center text-muted py-5'>Belum ada artikel yang tersedia saat ini.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>