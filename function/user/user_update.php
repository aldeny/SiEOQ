<?php
// koneksi database
include '../../koneksi.php';

// menangkap data yg dikirim dari form user.php
$id = $_POST['id'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role_id = $_POST['role_id'];

// update data ke databse
mysqli_query($koneksi,"UPDATE user SET nama='$nama', username='$username', password='$password', role_id='$role_id' WHERE id='$id'");

// mengalihkan halaman kembali ke index.php
header("location:../../user.php");


?>