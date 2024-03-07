<?php
// koneksi database
include '../../koneksi.php';


$id = $_POST['id'];
$nama_sup = $_POST['nama_sup'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

// update data ke databse
$update = mysqli_query($koneksi,"UPDATE supplier SET nama_sup='$nama_sup', alamat='$alamat', no_hp='$no_hp' WHERE id='$id'");

if ($update) {
    session_start();
    $_SESSION['success'] = "Data berhasil diperbarui";
} else {
    session_start();
    $_SESSION['error'] = "Data gagal diperbarui";
}

// mengalihkan halaman kembali ke index.php
header("location:../../supplier/supplier.php");


?>