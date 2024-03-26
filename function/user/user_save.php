<?php
// koneksi database
include '../../koneksi.php';

// menangkap data yg dikirim dari form user.php
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role_id = $_POST['role_id'];

// query input ke databse
mysqli_query($koneksi,"INSERT INTO user values('','$nama','$username','$password','$role_id')");

// kembali ke user.php
header("location:../../user/user.php");


?>