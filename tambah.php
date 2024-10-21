<?php
// Memanggil file koneksi.php
include_once("koneksi.php");

// Perkondisian untuk mengecek apakah tombol submit sudah ditekan.
if (isset($_POST['Submit'])) {
    // Variable untuk menampung data $_POST yang dikirimkan melalui form.
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $institusi = $_POST['institusi'];
    $country = $_POST['country'];
    $address = $_POST['address'];

    // Syntax untuk menambahkan data ke table peserta
    $result = mysqli_query($conn, "INSERT INTO peserta VALUES('','$email','$nama','$institusi','$country','$address')")    ;

    // Menampilkan pesan jika data berhasil disimpan.
    echo "Data berhasil disimpan. <a href='dashboard_admin.php'>View Users</a>";
    exit();
}
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Tambah data peserta</title>
</head>

<body>
    <a href="dashboard_admin.php" type="button" class="btn btn-link">Halaman Utama </a>
    <br /><br />
    <form action="tambah.php" method="post" name="form1">
        <table class="table">
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Institusi</td>
                <td><input type="text" name="institusi" ></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><input type="text" name="country"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="textarea" name="address"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-primary" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>

</html>