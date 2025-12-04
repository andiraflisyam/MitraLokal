<?php
$conn = mysqli_connect("localhost", "root", "", "lilygaleri1");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
