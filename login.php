<?php
// Memulai sesi
session_start();
include 'koneksi.php';  // Memasukkan file koneksi database

// Mengecek jika form login disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // Menggunakan MD5 untuk hashing password

    // Query untuk mencari pengguna berdasarkan username dan password
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Pengguna ditemukan
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan peran pengguna
        if ($user['role'] == 'admin') {
            header("Location: dashboard_admin.php");
        } else {
            header("Location: dashboard_user.php");
        }
    } else {
        // Jika username atau password salah
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php
    // Jika ada error tampilkan pesan error
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <form action="login.php" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Username :</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">    
            <label for="password" class="form-label">Password :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
            <button type="masuk" class="btn btn-primary">Masuk</button>
    </form>
</body>
</html>
