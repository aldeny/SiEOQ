<?php
// koneksi database
include '../../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// gunakan fungsi di bawah ini agar session bisa dibuat
session_start();

// menghapus data dari database
mysqli_query($koneksi,"delete from satuan where id='$id'");

// set session sukses
$_SESSION["sukses"] = 'Data Berhasil Dihapus';

// mengalihkan halaman kembali ke index.php
header("location:../../satuan/index.php");


?>