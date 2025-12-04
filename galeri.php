<?php 
include('koneksi.php');  // Menghubungkan ke database
error_reporting(E_ERROR | E_PARSE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Produk - Lily Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <style>
        body {
            background-color: whitesmoke;
        }
        .content-box {
            background: rgba(255, 230, 230, 0.9); /* Warna latar belakang content box */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px 0;
        }
        #produk-container .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
        }
        #produk-container .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .heading-black {
            color: #4A4A4A;
            font-size: 30px;
        }
        .p-gray {
            color: #6C757D;
        }
        .card {
            border: none;
        }


        .filter-btn {
    margin: 0 5px;
}

.filter-btn.active {
    background-color: #0d6efd;
    color: white;
    border-color: #0d6efd;
}

/* Aturan untuk memastikan gambar tetap ukuran yang diinginkan */
.fixed-image {
    width: 100%;  /* Membuat gambar mengisi lebar card */
    height: 200px; /* Menetapkan tinggi gambar tetap */
    object-fit: cover; /* Agar gambar tetap proporsional meskipun dipotong */
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

    <div class="container my-5">
    <h2 class="text-center mb-4 heading-black">Galeri Produk</h2>
    
    <!-- Filter Buttons -->
    <div class="text-center mb-4">
        <button class="btn btn-outline-primary filter-btn active" data-filter="all">Semua</button>
        <button class="btn btn-outline-primary filter-btn" data-filter="gambar">Foto</button>
        <button class="btn btn-outline-primary filter-btn" data-filter="video">Video</button>
    </div>
    
    <!-- Galeri Produk -->
    <div class="row" id="produk-container">
        
        <!-- Contoh Gambar -->
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk1.jpg" class="card-img-top fixed-image  modal-trigger" alt="Produk 1">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk2.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 2">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk3.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 3">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk4.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 4">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk5.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 5">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk6.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 6">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk7.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 7">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk8.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 8">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk9.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 9">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk10.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 10">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk11.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 11">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk12.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 12">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk13.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 13">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk14.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 14">
            </div>
        </div>
        <div class="col-md-4 mb-4 gallery-item" data-category="gambar">
            <div class="card">
                <img src="assets/images/produk15.jpg" class="card-img-top fixed-image modal-trigger" alt="Produk 15">
            </div>
        </div>



        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Tampilan Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid" alt="Gambar Modal">
            </div>
        </div>
    </div>
</div>


        <!-- Contoh Video -->
        <div class="col-md-4 mb-4 gallery-item" data-category="video">
            <div class="card">
                <video class="card-img-top" width="360" height="640" controls>
                    <source src="assets/images/video1.mp4" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>
</diV>
            <div class="col-md-4 mb-4 gallery-item" data-category="video">
            <div class="card">
                <video class="card-img-top" width="360" height="640" controls>
                    <source src="assets/images/video2.mp4" type="video/mp4">
                    Browser Anda tidak mendukung tag video.
                </video>
            </div>

        </div>
    </div>
</div>

<!-- footer -->
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
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".filter-btn");
        const items = document.querySelectorAll(".gallery-item");
        
        buttons.forEach(button => {
            button.addEventListener("click", function() {
                const filter = this.getAttribute("data-filter");
                
                buttons.forEach(btn => btn.classList.remove("active"));
                this.classList.add("active");
                
                items.forEach(item => {
                    if (filter === "all" || item.getAttribute("data-category") === filter) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalTriggerElements = document.querySelectorAll(".modal-trigger");
        const modalImage = document.getElementById("modalImage");
        const imageModal = new bootstrap.Modal(document.getElementById("imageModal"));

        modalTriggerElements.forEach(element => {
            element.addEventListener("click", function() {
                modalImage.src = this.src;
                imageModal.show();
            });
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const videoThumbnails = document.querySelectorAll(".video-thumbnail");
        const modalVideo = document.getElementById("modalVideo");
        const videoModal = new bootstrap.Modal(document.getElementById("videoModal"));

        videoThumbnails.forEach(video => {
            video.addEventListener("click", function () {
                const videoSrc = this.querySelector("source").src;
                modalVideo.querySelector("source").src = videoSrc;
                modalVideo.load();
                videoModal.show();
            });
        });

        document.getElementById("videoModal").addEventListener("hidden.bs.modal", function () {
            modalVideo.pause();
        });
    });
</script>


</body>
</html>
