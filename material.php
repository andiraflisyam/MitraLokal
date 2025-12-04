<?php 
include('koneksi.php');  // Menghubungkan ke database
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ketersediaan Material - Lily Galeri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link rel="shortcut icon" href="assets/images/logolite1.png">
  <style>
    body {
      background-color: whitesmoke;
    }
    .heading-black{
        color: #4A4A4A;
        font-size: 30px;
    }
    .content-box {
        background: rgba(255, 230, 230, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 10px 0;
    }
    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-radius: 10px;
      overflow: hidden;
    }
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .card img {
      height: 200px;
      object-fit: cover;
      width: 100%;
    }

    /* Ikon WhatsApp */
.floating-whatsapp i {
  font-size: 28px; /* Ukuran ikon */
  animation: bounce 1.5s infinite; /* Efek animasi ikon */
}

.floating-whatsapp {
  position: fixed; /* Tetap berada di posisi yang sama saat di-scroll */
  bottom: 20px; /* Jarak dari bawah */
  right: 20px; /* Jarak dari kanan */
  background: linear-gradient(45deg, #25d366, #1ebe57); /* Gradient hijau */
  color: white; /* Warna ikon */
  width: 65px; /* Lebar tombol */
  height: 65px; /* Tinggi tombol */
  border-radius: 50%; /* Membuat tombol berbentuk lingkaran */
  display: flex; /* Mengatur tata letak ikon di dalam tombol */
  justify-content: center; /* Pusatkan secara horizontal */
  align-items: center; /* Pusatkan secara vertikal */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
  z-index: 1000; /* Pastikan tombol berada di atas elemen lain */
  text-decoration: none; /* Hilangkan garis bawah pada link */
  transition: transform 0.3s ease, box-shadow 0.3s ease; /* Efek animasi */
}

/* Animasi bounce */
@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-8px);
  }
  60% {
    transform: translateY(-4px);
  }
}
  </style>
</head>
<body>
  <!-- Navbar -->
  <?php include 'navbar.php' ?>

  <!-- Daftar Material -->
  <div class="container my-5">
  <h2 class="text-center mb-4 heading-black">Ketersediaan Material</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4 content-box" id="material-container">
    <?php
    $query = "SELECT * FROM material ORDER BY MaterialID DESC";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="col">
          <div class="card h-100">
            <!-- Tambahkan data-bs-toggle dan data-bs-target pada gambar -->
            <img src="admin/material/<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['NamaMaterial']; ?>" data-bs-toggle="modal" data-bs-target="#materialModal<?php echo $row['MaterialID']; ?>">
            <div class="card-body text-center">
              <h5 class="card-title"><?php echo $row['NamaMaterial']; ?></h5>
              <p class="card-text">
                <?php echo strlen($row['DeskripsiMaterial']) > 50 
                  ? substr($row['DeskripsiMaterial'], 0, 50) . '...' 
                  : $row['DeskripsiMaterial']; ?>
              </p>
            </div>
          </div>
        </div>
  
    <!-- Modal -->
    <div class="modal fade" id="materialModal<?php echo $row['MaterialID']; ?>" tabindex="-1" aria-labelledby="materialModalLabel<?php echo $row['MaterialID']; ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="materialModalLabel<?php echo $row['MaterialID']; ?>"><?php echo $row['NamaMaterial']; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Gambar di modal -->
            <img src="admin/material/<?php echo $row['gambar']; ?>" class="img-fluid mb-3" alt="<?php echo $row['NamaMaterial']; ?>">
            <p><?php echo $row['DeskripsiMaterial']; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php
      }
    } else {
      echo "<div class='col-12 text-center'><p>Tidak ada material yang tersedia.</p></div>";
    }
    ?>
  </div>
</div>



  <!-- Footer -->
  <footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- Kontak & Alamat -->
            <div class="col-md-4">
                <h5>Kontak Kami</h5>
                <p><i class="fas fa-map-marker-alt"></i> NTI , Jln.Manggis 4 Blok J N0.3</p>
                <p><i class="fas fa-phone"></i> 0811 445 052</p>
                <p><i class="fas fa-envelope"></i> lily.mihoradjab@gmail.com</p>
                <div class="social-icons mt-3">
                    <a href="https://www.facebook.com/eliyarti.mihoradjab?mibextid=ZbWKwL" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="https://www.instagram.com/lie_lygaleri?igsh=MTAzb29qdXNwMWVjNQ==" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="https://wa.me/62811445052" class="text-light me-3"><i class="fab fa-whatsapp fa-lg"></i></a>
                </div>
            </div>

            <!-- Peta Google Maps -->
            <div class="col-md-4">
                <h5>Lokasi Kami</h5>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item w-100" 
                        src="https://maps.google.com/maps?width=600&amp;height=100&amp;hl=en&amp;q=NTI , Jln.Manggis 4 Blok J No. 3&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                        width="100%" height="200" allowfullscreen loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- Navigasi Cepat -->
            <div class="col-md-4">
                <h5>Navigasi Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php#tentangkami" class="text-light">Tentang Kami</a></li>
                    <li><a href="katalog.php#katalog" class="text-light">Produk</a></li>
                    <li><a href="https://wa.me/62811445052?text=Halo,%20saya%20tertarik%20dengan%20produk%20Anda!" class="text-light">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-4">
            <hr class="bg-light">
            <p class="mb-0">&copy; 2024 Lily Galeri. Semua Hak Dilindungi.</p>
        </div>
    </div>

</footer>
<a href="https://wa.me/62811445052?text=Halo,%20saya%20tertarik%20dengan%20produk%20Anda!" target="_blank" class="floating-whatsapp">
  <i class="fab fa-whatsapp"></i>
</a>


<!-- Tambahkan FontAwesome untuk ikon -->
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
