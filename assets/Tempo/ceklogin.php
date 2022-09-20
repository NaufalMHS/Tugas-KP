<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($connect,"select * from acc where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	echo "<script> alert ('Login Berhasil !');</script>";
	echo "<script> window.location ='./NiceAdmin/home.html';</script>";
}else{
    	echo "<script> alert ('Login Gagal ! Username dan Password tidak benar ');</script>";
    	echo "<script> window.location ='';</script>";
}
?>