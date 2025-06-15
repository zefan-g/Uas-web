<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jenis = $_POST['jenis'];
    if ($jenis === 'biodata') {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $ttl = mysqli_real_escape_string($conn, $_POST['ttl']);
        $jk = mysqli_real_escape_string($conn, $_POST['jk']);
        $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
        mysqli_query($conn, "INSERT INTO biodata (nama, ttl, jk, alamat) VALUES ('$nama', '$ttl', '$jk', '$alamat')");
    } elseif ($jenis === 'pendidikan') {
        $sd = mysqli_real_escape_string($conn, $_POST['sd']);
        $smp = mysqli_real_escape_string($conn, $_POST['smp']);
        $sma = mysqli_real_escape_string($conn, $_POST['sma']);
        $kuliah = mysqli_real_escape_string($conn, $_POST['kuliah']);
        mysqli_query($conn, "INSERT INTO pendidikan (sd, smp, sma, kuliah) VALUES ('$sd', '$smp', '$sma', '$kuliah')");
    } elseif ($jenis === 'kontak') {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
        mysqli_query($conn, "INSERT INTO kontak (email, telepon) VALUES ('$email', '$telepon')");
    }
}
header("Location: index.php");
exit;
?>
