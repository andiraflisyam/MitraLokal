<?php
session_start();
include 'database.php'; // Include file database

// Kelas dasar untuk pengguna
class User {
    protected $username;
    protected $name;
    protected $phone;
    protected $address;
    protected $email;
    protected $role;
    private $hashedPassword;

    public function __construct($data) {
        $this->username = $data['username'];
        $this->name = $data['Nama'];
        $this->phone = $data['Nomor_Telpon'];
        $this->address = $data['Alamat'];
        $this->email = $data['Email'];
        $this->role = $data['Peran'];
        $this->hashedPassword = $data['password'];
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->hashedPassword);
    }

    public function getRole() {
        return $this->role;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getEmail() {
        return $this->email;
    }
}

// Kelas turunan untuk Admin
class Admin extends User {
    public function redirect() {
        header("Location: admin/index.php");
        exit();
    }
}

// Kelas turunan untuk Member
class Member extends User {
    public function redirect() {
        header("Location: index.php");
        exit();
    }
}

// Fungsi untuk menangani login
function login($username, $password) {
    $database = new Database();
    $conn = $database->getConnection();

    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $user = null;

        // Membuat objek berdasarkan role
        if ($user_data['Peran'] === 'admin') {
            $user = new Admin($user_data);
        } else {
            $user = new Member($user_data);
        }

        // Verifikasi password
        if ($user->verifyPassword($password)) {
            // Simpan data ke dalam session
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['role'] = $user->getRole();
            $_SESSION['name'] = $user->getName();
            $_SESSION['phone'] = $user->getPhone();
            $_SESSION['address'] = $user->getAddress();
            $_SESSION['email'] = $user->getEmail();

            // Redirect sesuai role
            $user->redirect();
        } else {
            return "Password salah!";
        }
    } else {
        return "Pengguna tidak ditemukan!";
    }
}

// Proses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error_message = login($username, $password);
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liely Gallery - Login</title>
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
        .login-container {
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

    <div class="login-container">
        <div class="brand">Liely Gallery</div>
        <form method="POST" action="login.php">
            <div class="icon-input">
                <i class="bi bi-person-fill"></i>
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="icon-input">
                <i class="bi bi-lock-fill"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn">
    <i class="bi bi-box-arrow-in-right"></i> Login
</button>

            
            <?php if (isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
            
            <div class="text-center">
            <p class="small-text">Belum punya akun? <a href="register.php">Daftar Disini</a></p>
        </div>

            <!-- Tombol Beranda dengan ikon dan ukuran lebih kecil -->
            <a href="index.php" class="btn btn-beranda">
                <i class="bi bi-house-door-fill"></i> Beranda
            </a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

