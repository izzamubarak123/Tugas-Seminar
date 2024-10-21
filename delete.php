<?php
// mengambil file koneksi.php
include_once("koneksi.php");

// mengambil id_peserta dari url
$id_peserta = $_GET['id_peserta'];

// Syntax untuk menghapus data berdasarkan id_peserta
$result = mysqli_query($conn, "DELETE FROM peserta WHERE id_peserta='$id_peserta'");

// Setelah berhasil dihapus redirect ke index.php
header("Location:dashboard_admin.php");
