<?php
session_start();

// Cek jika pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Jika belum login, arahkan ke halaman login
    exit();
}

// Ambil data pengguna dari session
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];
$email = $_SESSION['email'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pre-Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Imperial+Script&family=Rasa:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">

    <style>
        body {
    background-color: whitesmoke;
    font-family: 'Arial', sans-serif; /* Menggunakan font Arial yang mudah dibaca */
    line-height: 1.6; /* Menambahkan jarak antar baris untuk kenyamanan membaca */
}

.container-box {
    margin: auto;
    padding: 20px;
    background-color: rgba(255, 230, 230, 0.9);
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 800px; /* Membatasi lebar maksimal container */
    width: 100%; /* Menggunakan lebar 100% dari elemen induk */
}

h2 {
    font-family: 'Verdana', sans-serif; /* Menggunakan font Verdana untuk judul */
    font-weight: 600; /* Menambah ketebalan font untuk judul */
}
.form-label {
    font-family: "Rasa", serif; /* Menggunakan font Arial pada label */
    font-weight: 500; /* Menambah ketebalan font untuk label */
}

        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px;
            border: 1px solid #E4D4C5;
            font-family: 'Arial', sans-serif; /* Menggunakan font Arial pada inputan form */
    font-size: 1rem; /* Ukuran font yang lebih pas untuk input form */
        }

        .form-control:focus, .form-select:focus {
            border-color: #D26F72;
            box-shadow: 0 0 8px rgba(210, 111, 114, 0.5);
        }

        .btn-primary {
            background-color: #D26F72;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #B75F5B;
        }

        /* WhatsApp Floating Button */
        .floating-whatsapp i {
            font-size: 28px;
            animation: bounce 1.5s infinite;
        }

        .floating-whatsapp {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(45deg, #25d366, #1ebe57);
            color: white;
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-8px); }
            60% { transform: translateY(-4px); }
        }

        /* Footer Styles */
        footer {
            background-color: #D26F72;
            color: white;
            padding: 30px 0;
        }

        footer h5 {
            color: white;
            margin-bottom: 15px;
        }

        footer p, footer a {
            color: #f1f1f1;
        }

        footer a:hover {
            color: #f1c40f;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<?php include 'navbar.php' ?>

<div class="container my-5 container-box">
        <h2>Form Pre-Order</h2>
        <form id="preorderForm" action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['name']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="noWhatsApp" class="form-label">Nomor WhatsApp</label>
                <input type="text" class="form-control" id="noWhatsApp" name="noWhatsApp" value="<?php echo $_SESSION['phone']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Pengiriman</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $_SESSION['address']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="jenisAksesoris" class="form-label">Jenis Aksesoris</label>
                <select class="form-select" id="jenisAksesoris" name="jenisAksesoris" required>
                    <option value="">Pilih jenis aksesoris</option>
                    <option value="Wire Weaving jewelry">Wire Weaving jewelry</option>
                    <option value="Embroidery jewelry">Embroidery jewelry</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="desain" class="form-label">Desain/Bentuk</label>
                <input type="text" class="form-control" id="desain" name="desain" placeholder="Desain/bentuk yang diinginkan" required>
            </div>
            <div class="mb-3">
                <label for="material" class="form-label">Material Tambahan</label>
                <input type="text" class="form-control" id="material" name="material" placeholder="Material tambahan yang diinginkan" required>
            </div>
            <div class="mb-3">
                <label for="photoReferensi" class="form-label">Foto Referensi Desain</label>
                <input type="file" class="form-control" id="photoReferensi" name="photoReferensi" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="linkMaps" class="form-label">Link Lokasi (Opsional)</label>
                <input type="url" class="form-control" id="linkMaps" name="linkMaps" placeholder="Tempel link Google Maps jika ada">
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </form>
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
  
<script>
    function submitForm() {
    const form = document.getElementById('preorderForm');
    const formData = new FormData(form);

    // Kirim ke PHP menggunakan fetch
    fetch('upload.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mengalihkan ke WhatsApp setelah pengiriman
        window.open(data, "_blank");
    })
    .catch(error => console.error('Error:', error));
}

</script>
</body>
</html>