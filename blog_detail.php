<?php
require('koneksi.php');
error_reporting(E_ERROR | E_PARSE);

$artikel = null;
$id_blog = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_blog > 0) {
    // Menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT judul, gambar, isi FROM blog WHERE id = ?");
    $stmt->bind_param("i", $id_blog);
    $stmt->execute();
    $result = $stmt->get_result();
    $artikel = $result->fetch_assoc();
    $stmt->close();
}

// Jika artikel tidak ditemukan, hentikan eksekusi dan tampilkan pesan
if (!$artikel) {
    // Anda bisa membuat halaman 404.php yang lebih bagus
    http_response_code(404);
    die("Artikel tidak ditemukan.");
}

$judul = htmlspecialchars($artikel['judul']);
$gambar = htmlspecialchars($artikel['gambar']);
// htmlspecialchars_decode digunakan agar tag HTML dari editor (seperti <p>, <b>) bisa ditampilkan
$isi = htmlspecialchars_decode($artikel['isi']);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $judul; ?> - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <style>
        .blog-image { width: 100%; max-height: 500px; object-fit: cover; border-radius: 15px; }
        .blog-content { line-height: 1.8; font-size: 1.1rem; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1"><?php echo $judul; ?></h1>
                        </header>
                    <figure class="mb-4">
                        <img class="img-fluid blog-image" src="admin/blog/<?php echo $gambar; ?>" alt="<?php echo $judul; ?>">
                    </figure>
                    <section class="mb-5 blog-content">
                        <?php echo $isi; ?>
                    </section>
                </article>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>