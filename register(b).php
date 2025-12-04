<?php
session_start();
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $nomor_telpon = $_POST['nomor_telpon'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $peran = 'user'; // Default to 'user' role

    // Insert the data into the database
    $query = "INSERT INTO user (Nama, username, password, Nomor_Telpon, Alamat, Email, Peran) 
              VALUES ('$nama', '$username', '$password', '$nomor_telpon', '$alamat', '$email', '$peran')";
    
    if ($conn->query($query) === TRUE) {
        header("Location: login.php"); // Redirect to login after registration
        exit();
    } else {
        $error_message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #007bff, #6610f2);
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            max-width: 450px;
            padding: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
        }
        .brand {
            font-size: 26px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        .form-control {
            border-radius: 50px;
            padding-left: 50px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.4);
            border-color: #007bff;
        }
        .icon-input {
            position: relative;
            margin-bottom: 20px;
        }
        .icon-input i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff;
        }
        .btn {
            border-radius: 50px;
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-beranda {
        background-color: #28a745;
        margin-top: 10px;
        font-size: 14px; /* Menurunkan ukuran font */
        padding: 8px 15px; /* Mengurangi padding agar lebih kecil */
        width: auto; /* Tombol menyesuaikan lebar konten */
    }
    .btn-beranda:hover {
        background-color: #218838;
    }
        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }
        .text-center {
            margin-top: 20px;
        }
        .text-center a {
            color: #007bff;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        .small-text {
        font-size: 12px; /* Ukuran font lebih kecil */
    }
    .small-text a {
        color: #007bff;
    }
    .small-text a:hover {
        text-decoration: underline;
    }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="brand">Liely Gallery</div>
        <form method="POST" action="register.php">
            <div class="icon-input">
                <i class="bi bi-person-fill"></i>
                <input type="text" name="nama" class="form-control" placeholder="Full Name" required>
            </div>
            <div class="icon-input">
                <i class="bi bi-person-lines-fill"></i>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="icon-input">
                <i class="bi bi-shield-lock-fill"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="icon-input">
                <i class="bi bi-phone-fill"></i>
                <input type="text" name="nomor_telpon" class="form-control" placeholder="Phone Number" required>
            </div>
            <div class="icon-input">
    <i class="bi bi-house-door-fill"></i>
    <textarea name="alamat" class="form-control" placeholder="Address" required rows="4"></textarea>
</div>

            <div class="icon-input">
                <i class="bi bi-envelope-fill"></i>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <button type="submit" name="register" class="btn">  <i class="bi bi-pencil-fill"></i> Register</button>

            <?php if (isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>


            <div class="text-center">
            <p class="small-text">Sudah punya akun? <a href="login.php">Login Disini</a></p>
        </div>
           
            <a href="index.php" class="btn btn-beranda">
                <i class="bi bi-house-door-fill"></i> Beranda
            </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
