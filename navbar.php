<?php
// Memulai session hanya jika belum ada session yang aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ambil data dari session jika ada
$username = $_SESSION['username'] ?? null;
$name = $_SESSION['name'] ?? null;
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Koh+Santepheap:wght@400;700&display=swap" rel="stylesheet">
<style>
    .navbar-brand {
        display: flex;
        align-items: center;
    }
    .navbar-brand img {
        height: 40px;
    }
    .navbar-brand span {
        font-family: "Koh Santepheap", serif;
        font-weight: 700;
        font-size: 1.25rem;
        margin-left: 10px;
        color: white;
    }
    .navbar-nav .nav-link {
        font-size: 14px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/logolite1.png" alt="logo">
            <span>Lily Galeri</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="katalog.php"><i class="bi bi-shop"></i> Katalog</a></li>
                <li class="nav-item"><a class="nav-link" href="material.php"><i class="bi bi-gem"></i> Material</a></li>
                <li class="nav-item"><a class="nav-link" href="keranjang.php"><i class="bi bi-basket"></i> Keranjang</a></li>
                <li class="nav-item"><a class="nav-link" href="edukasi.php"><i class="bi bi-book"></i> Edukasi</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.php"><i class="bi bi-newspaper"></i> Blog</a></li>
                
                <?php if ($username): ?>
                    <li class="nav-item"><a class="nav-link" href="preorder.php"><i class="bi bi-pencil-square"></i> Pre-Order</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> Halo, <?php echo htmlspecialchars(strtok($name, " ")); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profil.php">Profil Saya</a></li>
                            <li><a class="dropdown-item" href="riwayat.php">Riwayat Belanja</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div style="height: 70px;"></div> <!-- Spacer for fixed-top navbar -->
