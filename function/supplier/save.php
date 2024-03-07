<?php
// koneksi database
include '../../koneksi.php';

$kode_sup = $_POST['kode_sup'];
$nama_sup = $_POST['nama_sup'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

// query input ke databse
$insert = mysqli_query($koneksi,"INSERT INTO supplier values('','$kode_sup','$nama_sup','$alamat','$no_hp')");

//logika notifikasi
if ($insert) {
    session_start();
    $_SESSION['success'] = "Data berhasil ditambahkan";
} else {
    session_start();
    $_SESSION['error'] = "Data gagal ditambahkan";
}

// kembali ke user.php
header("location:../../supplier/supplier.php");


?>