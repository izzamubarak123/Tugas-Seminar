<?php
// Memulai sesi
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Memanggil file koneksi.php
include 'koneksi.php';

// Mengambil semua data dari tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM peserta");

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Halaman Admin</title>
</head>

<body>
    <h2>Daftar Peserta Seminar</h2>
    <a href="logout.php" class="btn btn-danger">Logout</a><br /><br />
    <a href="tambah.php" class="btn btn-primary">Tambah Data Baru</a><br /><br />

    <table class="table table-striped table-hover" border="1" cellpadding="10" cellspacing="3">
        <thead>
            <tr>
                <th>Email</th>
                <th>Nama</th>
                <th>Institusi</th>
                <th>Country</th>
                <th>Address</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Menampilkan data mahasiswa dari database
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['institusi'] . "</td>";
            echo "<td>" . $user_data['country'] . "</td>";
            echo "<td>" . $user_data['address'] . "</td>";
            echo "<td>
                    <a href='edit.php?id_peserta=" . $user_data['id_peserta'] . "'class='btn btn-warning'>Edit</a>
                    <a href='delete.php?id_peserta=" . $user_data['id_peserta'] . "'class='btn btn-warning'>Delete</a>
                </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
