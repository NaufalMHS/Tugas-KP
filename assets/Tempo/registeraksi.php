<?php 
// koneksi database
include 'config.php';

// menangkap data yang di kirim dari form
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Email = $_POST['Email'];

// menginput data ke database
mysqli_query($connect,"insert into admin (Username,Password,Email) values
('$Username','$Password','$Email')");

// mengalihkan halaman kembali ke index.php
echo "<script> alert ('Akun Telah Berhasil Dibuat');</script>";
echo "<script> window.location ='index.html';</script>";

?>