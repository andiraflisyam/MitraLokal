<?php
session_start();  // Pastikan session dimulai
include('koneksi.php');  // Menghubungkan ke database
error_reporting(E_ERROR | E_PARSE);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lily Galeri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


  <link rel="shortcut icon" href="assets/images/logo2.jpg">
  <style>
    #jumbotron {
            text-shadow: #000 2px 2px;
        }
        #jumbotron h1 {
            color: #fff;
        }
        #jumbotron p {
            color: #fff;
        }
        .background-jumbotron {
            background-image: url('assets/images/tesbg.webp');
            height: 300px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            box-shadow: inset 0 0 2000px rgba(0, 0, 0, 0.5);
        }
    
    body{
        background-color: whitesmoke;
    }

    .heading-black{
        color: #4A4A4A;
        font-size: 30px;
    }

    .p-gray{
        color: #6C757D;
    }

    .icon-blue{
        color: #34495E;
    }
    
    .bg-blue {
        color: lightskyblue;
        }

    .card {
      border: none;
    }
    .carousel img {
      max-height: 500px;
      object-fit: cover;
      border-radius: 2%;
    }

    .carousel.slide {
    background-color: #ffffff; 
    }

    /* Membuat garis diagonal pada sisi kiri gambar */
.diagonal-border-left {
    width: 100%;
    height: auto;
    clip-path: polygon(0 0, 100% 10%, 100% 100%, 0 100%);
    object-fit: cover;
    border-radius: 2%;
}

/* Membuat garis diagonal pada sisi kanan gambar */
.diagonal-border-right {
    width: 100%;
    height: auto;
    clip-path: polygon(0 10%, 100% 0, 100% 100%, 0 100%);
    object-fit: cover;
    border-radius: 2%;
}

/* Styling untuk latar belakang paragraf */
.content-box {
    background: rgba(255, 230, 230, 0.9); /* Warna latar belakang semi-transparan */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
    margin: 10px 0;
}

.container-box {
  margin: auto; /* Untuk memusatkan secara horizontal */
    padding: 20px; /* Ruang internal */
    background-color: rgba(255, 230, 230, 0.9); /* Warna latar belakang */
    border-radius: 10px; /* Sudut melengkung */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan */
}

/* Style dasar untuk tombol */
#nav-katalog {
    transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
    border-radius: 8px; /* Sudut tombol melengkung */
}

/* Efek hover */
#nav-katalog:hover {
    background-color: #28a745; /* Warna hijau lebih gelap */
    transform: scale(1.1); /* Membesarkan tombol sedikit */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Shadow lebih tajam */
    color: #fff; /* Pastikan teks tetap terlihat */
    text-decoration: none; /* Hilangkan underline (jika ada) */
}


/* Paragraf */
.p-gray {
    margin: 0;
    color: #4A4A4A;
    font-size: 16px;
    line-height: 1.8;
}

.p-gray2 {
    margin: 0;
    color: #4A4A4A;
    font-size: 18px;
    line-height: 1.8;
}

    
    .footer {
      text-align: center;
      padding: 20px;
      background: #f8f9fa;
    }

  /* Tombol Floating WhatsApp */
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

/* Hover Effect */
.floating-whatsapp:hover {
  transform: scale(1.2); /* Membesar saat di-hover */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3); /* Bayangan lebih besar */
}

/* Ikon WhatsApp */
.floating-whatsapp i {
  font-size: 28px; /* Ukuran ikon */
  animation: bounce 1.5s infinite; /* Efek animasi ikon */
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

/* Tooltip */
.tooltip-text {
  visibility: hidden; /* Awalnya tidak terlihat */
  position: absolute;
  bottom: 80px; /* Jarak tooltip dari tombol */
  right: -10px; /* Penyesuaian posisi horizontal */
  background-color: rgba(0, 0, 0, 0.8); /* Warna hitam semi-transparan */
  color: #fff; /* Warna teks tooltip */
  padding: 5px 10px; /* Ruang di dalam tooltip */
  border-radius: 5px; /* Sudut melengkung */
  font-size: 14px; /* Ukuran font kecil */
  white-space: nowrap; /* Mencegah teks terpotong */
  opacity: 0; /* Tidak terlihat */
  transition: opacity 0.3s ease; /* Efek transisi */
}

/* Tampilkan tooltip saat hover */
.floating-whatsapp:hover .tooltip-text {
  visibility: visible;
  opacity: 1; /* Tampilkan tooltip */
}


  </style>
</head>
<body>

  <!-- Navbar -->

  <?php include 'navbar.php' ?>

  <!-- Hero Section (Jumbotron) -->
  <div id="jumbotron" class="jumbotron text-center bg-light py-5 background-jumbotron">
    <div class="container">
      <h1 class="display-4 fw-bold">Aksesoris Favorit Anda</h1>
      <p class="lead">Kami menyediakan berbagai produk untuk berbagai kebutuhan Anda. Tidak hanya indah dan berkualitas, tetapi juga eksklusif.</p>
      <a href="katalog.php" class="btn btn-primary btn-lg">Jelajahi Sekarang</a>
    </div>
  </div>

  <br>


  <br>

   <!-- About Section -->
<div id="tentangkami" class="container my-5 container-box">
  <br>
  <br>
  <h2 class="text-center mb-4 heading-black">Tentang Lily Gallery</h2>

  <!-- Baris 1: Gambar Kiri, Paragraf Kanan -->
  <div class="row align-items-center mb-5">
      <div class="col-md-6 position-relative" data-aos="fade-right" data-aos-duration="1000">
          <img src="assets/images/11.jpg" alt="Tentang Lily Gallery" class="img-fluid diagonal-border-right">
      </div>
      <div class="col-md-6">
          <div class="content-box" data-aos="fade-right" data-aos-duration="1000">
              <p class="p-gray">
                  Lily Gallery adalah usaha kreatif yang berfokus pada pembuatan aksesori unik dan berkualitas tinggi. 
                  Dengan menggunakan bahan dasar wire (kawat), kami menciptakan berbagai bentuk menarik yang dipadukan 
                  dengan seni sulam (embroidery) untuk menghasilkan produk yang eksklusif dan penuh nilai estetika.
              </p>
          </div>
      </div>
  </div>

  <!-- Baris 2: Paragraf Kiri, Gambar Kanan -->
  <div class="row align-items-center">
      <div class="col-md-6">
          <div class="content-box" data-aos="fade-left" data-aos-duration="1000">
              <p class="p-gray">
                  Setiap aksesori yang kami buat dikerjakan secara manual dan autentik, menjadikan setiap produk memiliki 
                  keunikan dan tidak ada yang sama. Kami berkomitmen untuk membawa keindahan karya lokal ke tingkat internasional, 
                  menjadikan seni dan kreativitas sebagai kunci utama.
              </p>
          </div>
      </div>
      <div class="col-md-6 position-relative" data-aos="fade-left" data-aos-duration="1000">
          <img src="assets/images/about2.jpg" alt="Karya Kreatif Lily Gallery" class="img-fluid diagonal-border-left">
      </div>
  </div>

  <!-- Baris 3: Gambar Kiri, Paragraf Kanan -->
<div class="row align-items-center mb-5">
  <div class="col-md-6 position-relative" data-aos="fade-right" data-aos-duration="1000">
      <img src="assets/images/about1.jpg" alt="Tentang Lily Gallery" class="img-fluid diagonal-border-right">
  </div>
  <div class="col-md-6">
      <div class="content-box" data-aos="fade-right" data-aos-duration="1000">
          <p class="p-gray2">
            “ Tetap Kreatif Teruslah Aktif Hidup Indah Dengan Berkarya ”
          </p>
      </div>
  </div>
</div>
</div>




  <br>

  <!-- Features Section -->
  <section id="keunggulan" class="container-fluid p-4 container-box">
    <h2 class="text-center mb-4 display-4 heading-black fw-bold" data-aos="fade-up" data-aos-duration="1000">Kenapa sih harus produk dari Lily Gallery?</h2>

    <div class="row text-center" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-4 mb-4">
            <span class="fa-stack fa-2x">
                <i class="fas fa-thumbs-up fa-stack-2x icon-blue"></i>
                <i class="fas fa-stack-1x text-white"></i>
            </span>
                <h4 class="mt-4 text-dark-gray">Produk Berkualitas</h4>
                <p class="p-gray">Keunggulan kami terletak pada kualitas produk yang dibuat secara detail dan eksklusif, mengutamakan keindahan desain serta ketahanan untuk memberikan nilai terbaik bagi pelanggan.</p>
        </div>
        
        <div class="col-md-4 mb-4">
            <span class="fa-stack fa-2x">
                <i class="fas fa-check-circle fa-stack-2x icon-blue"></i>
                <i class="fas fa-stack-1x text-white"></i>
            </span>
            <h4 class="mt-4 text-dark-gray">Bahan Premium</h4>
            <p class="p-gray">Produk kami dibuat menggunakan bahan premium yang dipilih dengan cermat untuk memastikan kualitas, keindahan, dan daya tahan terbaik.</p>
        </div>

        <div class="col-md-4 mb-4">
            <span class="fa-stack fa-2x">
                <i class="fas fa-certificate fa-stack-2x icon-blue"></i>
                <i class="fas fa-stack-1x text-white"></i>
            </span>
            <h4 class="mt-4 text-dark-gray">Eksklusif</h4>
            <p class="p-gray">Setiap produk kami dirancang secara eksklusif dengan desain unik yang tidak akan pernah sama satu dengan lainnya.</p>
        </div>
    </div>
</section>

  <br>
  
  <br>

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
  <span class="tooltip-text">Hubungi Kami</span>
</a>


<!-- Tambahkan FontAwesome untuk ikon -->
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>
