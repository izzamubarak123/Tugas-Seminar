<?php
// Koneksi ke database
$servername = "localhost";  // Nama server
$username = "root";         // Username MySQL
$password = "";             // Password MySQL (biarkan kosong jika default XAMPP)
$dbname = "sistem_login";   // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
