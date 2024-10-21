<?php
// Memanggil file koneksi.php
include_once("koneksi.php");

// Perkondisian untuk mengecek apakah tombol submit sudah ditekan.
if (isset($_POST['update'])) {
    $id_peserta = $_POST['id_peserta'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // Syntax untuk mengupdate data user berdasarkan id_peserta
    $result = mysqli_query($conn, "UPDATE peserta SET nama='$nama',institusi='$institusi',country='$country',address='$address'");

    // Redirect ke dashboard_admin.php
    header("Location: dashboard_admin.php");
}
?>
<?php
// Menampilkan data berdasarkan data yang kita pilih.

// Mengambil id_peserta dari url
$id_peserta = $_GET['id_peserta'];

// Syntax untuk mengambil data berdasarkan id_peserta
$result = mysqli_query($conn, "SELECT * FROM peserta WHERE id_peserta='$id_peserta'");
while ($user_data = mysqli_fetch_array($result)) {
    $email = $user_data['email'];
    $nama = $user_data['nama'];
    $institusi = $user_data['institusi'];
    $country = $user_data['country'];
    $address = $user_data['address'];
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit Data Peserta</title>
</head>

<body>
    <a href="dashboard_admin.php" type="button" class="btn btn-link">Halaman Utama</a>
    <br /><br />
    <form name="update_peserta" method="post" action="edit.php">
        <table class="table">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
            </tr>
            <tr>
                <td>Institusi</td>
                <td><input type="text" name="institusi" value=<?php echo $institusi; ?>></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country" value=<?php echo $country; ?>></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" value=<?php echo $address; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_peserta" value=<?php echo $id_peserta ?>></td>
                <td><input type="submit" class="btn btn-primary" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>