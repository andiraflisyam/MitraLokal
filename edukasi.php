<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi Wire Crafting & Embroidery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="assets/images/logolite1.png">
    <style>
        body {
         background-color: whitesmoke;
        }
        .container-box {
            margin: auto; /* Untuk memusatkan secara horizontal */
            padding: 20px; /* Ruang internal */
            background-color: rgba(255, 230, 230, 0.9); /* Warna latar belakang */
            border-radius: 10px; /* Sudut melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan */
        }

        .heading-black{
        color: #4A4A4A;
        font-size: 30;
    }

        h5{
        color: #4A4A4A;
        font-size: 15px;
        }

         p{
        color: #6C757D;
        text-align: justify;
         }

         .p{
        color: #6C757D;
         }
        .list-group-item {
            cursor: pointer;
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

<div class="container my-5 container-box">
    <h1 class="text-center mb-4 heading-black">Edukasi Wire Crafting & Embroidery</h1>

    <div class="row mb-4">
        <div class="col-md-6">
            <img src="assets/images/edukasi1.png" alt="Edukasi 1" class="img-fluid rounded shadow" style="width: 100%; height: 450px;">
        </div>
        <div class="col-md-6">
            <img src="assets/images/edukasi2.png" alt="Edukasi 2" class="img-fluid rounded shadow" style="width: 100%; height: 450px;">
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item" data-bs-toggle="collapse" data-bs-target="#wireCrafting">Apa itu Wire Crafting?</li>
        <div id="wireCrafting" class="collapse">
            <p class="p-3">
            Wire crafting adalah seni atau kerajinan tangan yang menggunakan kawat sebagai bahan utama untuk menciptakan berbagai bentuk, hiasan, atau aksesori seperti perhiasan (cincin, gelang, kalung, anting), dekorasi, hingga patung kecil. Kerajinan ini sangat populer karena fleksibilitas kawat yang memungkinkan pembuatnya menciptakan desain yang rumit dan unik. Bahan utama yang sering digunakan adalah kawat logam seperti tembaga, kuningan, perak, atau kawat berlapis emas, dengan tembaga menjadi pilihan umum karena mudah dibentuk dan tahan lama. Dalam pengerjaannya, alat seperti tang, mandrel (alat berbentuk silinder untuk membuat pola), serta file atau amplas untuk menghaluskan ujung kawat sangat diperlukan. Teknik yang sering digunakan meliputi membungkus (wrapping), memutar (twisting), dan menempelkan hiasan seperti batu permata atau mutiara. Wire crafting memiliki banyak kelebihan, seperti menghasilkan desain yang unik, fleksibilitas dalam menciptakan bentuk apa pun, serta ramah lingkungan karena menggunakan bahan yang dapat didaur ulang. Kerajinan ini dapat digunakan untuk berbagai keperluan, mulai dari membuat aksesori seperti gelang, kalung, dan cincin, hingga dekorasi rumah atau suvenir. Dengan semakin populernya tren DIY (Do It Yourself), wire crafting banyak diminati, terutama oleh pengusaha kecil (UMKM) yang ingin menawarkan produk eksklusif dan berdaya jual tinggi.
            </p>
        </div>

        <li class="list-group-item" data-bs-toggle="collapse" data-bs-target="#wireCraftingHistory">Sejarah Wire Crafting</li>
        <div id="wireCraftingHistory" class="collapse">
            <p class="p-3">
            Wire crafting, atau kerajinan kawat, telah memiliki sejarah panjang yang berakar pada berbagai peradaban kuno. Seni ini pertama kali muncul ribuan tahun yang lalu ketika manusia mulai menggunakan kawat logam untuk membuat perhiasan, alat, dan ornamen dekoratif. Pada zaman Mesir Kuno (sekitar 3.000 SM), kawat emas digunakan untuk membuat perhiasan mewah seperti gelang, anting, dan kalung yang dihiasi batu permata. Teknik wire wrapping (membungkus kawat) mulai dikenal di era ini, di mana kawat dililitkan tanpa menggunakan solder untuk mengikat batu atau memperkuat struktur.

Selama Abad Pertengahan di Eropa, wire crafting berkembang menjadi alat penting dalam kehidupan sehari-hari. Kawat digunakan untuk membuat baju zirah (chainmail), pagar, dan alat-alat rumah tangga. Selain itu, seni ini juga berkembang dalam bentuk perhiasan artistik yang dipengaruhi oleh desain Gothic.

Pada abad ke-19, wire crafting semakin populer dalam komunitas seni kerajinan tangan, khususnya di Amerika Serikat dan Eropa. Seniman mulai mengeksplorasi kawat sebagai medium untuk seni modern, menciptakan patung dan dekorasi dengan desain yang lebih kompleks.

Hingga saat ini, wire crafting tetap menjadi bentuk seni yang dihargai karena fleksibilitas dan keunikannya. Dengan berkembangnya teknologi dan inovasi bahan, kawat dalam berbagai jenis seperti tembaga, perak, dan baja tahan karat kini digunakan untuk menciptakan berbagai karya seni dan produk kreatif, mulai dari perhiasan hingga dekorasi interior. Wire crafting juga menjadi bagian penting dalam industri UMKM, khususnya untuk kerajinan tangan yang mengusung nilai seni dan keunikan.
            </p>
        </div>

        <li class="list-group-item" data-bs-toggle="collapse" data-bs-target="#wireCraftingCare">Cara Merawat Karya Wire Crafting</li>
        <div id="wireCraftingCare" class="collapse">
            <div class="d-flex align-items-start gap-3 p-2">
                <img src="assets/images/Kiriman_Instagram_Cara_Menggunakan_Skincare_Elegan_Krem_20241208_152332_0000[1].png" alt="wire" class="img-fluid" style="max-width: 300px; height: auto;">
                <div>
                    <h3>Apakah perhiasan tembaga bisa luntur?</h3>
                    <h4>Ya</h4>
                    <p>Perhiasan tembaga adalah salah satu jenis perhiasan yang paling mungkin untuk luntur atau berubah warna karena mengalami proses oksidasi. Namun, tembaga bisa menjadi perhiasan yang anti karat dan tahan lama. Tapi, dengan cara pemakaian dan penyimpanannya benar, perhiasan tembaga akan awet dan tidak mudah berubah warna.</p>
                    <ul>
                        <li class="p">Hindari aksesoris dari bahan kimia, lotion/minyak wangi.</li>
                        <li class="p">Jangan gunakan pada saat berolahraga/kegiatan yang berkeringat atau berenang.</li>
                        <li class="p">Simpan pada tempat yang kering.</li>
                        <li class="p">Gunakan plastik kedap udara atau kantong ziplock saat menyimpan.</li>
                    </ul>
                </div>
            </div>
        </div>

        <li class="list-group-item" data-bs-toggle="collapse" data-bs-target="#embroidery">Apa itu Embroidery?</li>
        <div id="embroidery" class="collapse">
            <p class="p-3">
            Embroidery, atau sulaman, adalah seni menghias kain atau bahan lain dengan menggunakan benang dan jarum. Teknik ini sering digunakan untuk menciptakan pola dekoratif, tulisan, atau gambar pada kain. Selain benang, embroidery juga bisa melibatkan elemen lain seperti manik-manik, payet, mutiara, atau pita untuk menambah estetika dan dimensi pada desainnya.

Seni sulaman telah ada sejak zaman kuno dan digunakan dalam berbagai budaya di seluruh dunia. Awalnya, embroidery memiliki fungsi simbolis atau religius, serta menunjukkan status sosial seseorang. Misalnya, sulaman pada pakaian bangsawan biasanya menggunakan benang emas atau perak dengan pola yang rumit.

Embroidery dapat dilakukan secara manual (hand embroidery) atau menggunakan mesin (machine embroidery). Dalam teknik manual, seorang pengrajin menggunakan tangan untuk membuat desain, memberikan sentuhan personal yang unik pada setiap karya. Sementara itu, embroidery mesin memungkinkan proses yang lebih cepat dengan tingkat presisi yang tinggi, sering digunakan dalam produksi massal seperti seragam, logo perusahaan, atau hiasan pakaian.
            </p>
        </div>

        <li class="list-group-item" data-bs-toggle="collapse" data-bs-target="#embroideryHistory">Sejarah Embroidery</li>
        <div id="embroideryHistory" class="collapse">
            <p class="p-3">
                Embroidery sudah dikenal sejak ribuan tahun lalu. Teknik ini ditemukan di berbagai budaya, termasuk Mesir kuno, Cina, dan Eropa. Pada masa itu, sulaman digunakan sebagai simbol status sosial dan sering kali menjadi bagian dari pakaian raja dan bangsawan. Embroidery juga memainkan peran penting dalam seni tekstil dan dekorasi di banyak negara.
            </p>
        </div>

        <li class="list-group-item" data-bs-toggle="collapse" data-bs-target="#embroideryCare">Cara Merawat Karya Embroidery</li>
        <div id="embroideryCare" class="collapse">
            <ul class="p-3">
                <li class="p">Jaga agar karya sulam tetap bersih dengan mencucinya sesuai dengan petunjuk yang tertera pada label kain.</li>
                <li class="p">Hindari mencuci karya embroidery dengan mesin cuci karena dapat merusak benang dan kain.</li>
                <li class="p">Jemur dengan cara digantung atau letakkan di tempat yang tidak terkena sinar matahari langsung untuk menghindari pudar.</li>
                <li class="p">Simpan di tempat yang sejuk dan kering, hindari kelembapan yang bisa merusak benang atau kain.</li>
            </ul>
        </div>
    </ul>
</div>





<BR>

</BR>
<BR>

</BR>    
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

</body>
</html>
