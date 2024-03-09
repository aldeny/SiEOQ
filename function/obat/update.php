<?php

include '../../koneksi.php';

$id = $_POST['id'];
$kode_obat = $_POST['kode_obat'];
$nama_obat = $_POST['nama_obat'];
$supplier = $_POST['supplier'];
$kategori = $_POST['kategori'];
$satuan = $_POST['satuan'];
$stock = $_POST['stock'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

//hilangkan tanda pemisah harga
$harga = str_replace(".", "", $harga);

//insert data obat
$insert = mysqli_query($koneksi, "UPDATE produk SET kode_obat = '$kode_obat', nama_obat = '$nama_obat', kategori_id = '$kategori', satuan_id = '$satuan', stock = '$stock', harga = '$harga', sup_id = '$supplier', keterangan = '$keterangan' WHERE id = '$id'");

if ($insert) {
    // Jika insert berhasil, set session success dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['success'] = "Data berhasil diperbarui";
    header("location:../../obat/index.php");
    exit();
} else {
    // Jika insert gagal, set session error dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['error'] = "Data gagal diperbarui";
    header("location:../../obat/create.php");
    exit();
}

?>