<?php

include '../../koneksi.php';

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
$insert = mysqli_query($koneksi, "INSERT INTO produk (kode_obat, nama_obat, kategori_id, satuan_id, stock, harga, sup_id, keterangan) VALUES ('$kode_obat', '$nama_obat', '$kategori', '$satuan', '$stock', '$harga', '$supplier', '$keterangan')");

if ($insert) {
    // Jika insert berhasil, set session success dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['success'] = "Data berhasil ditambahkan";
    header("location:../../obat/index.php");
    exit();
} else {
    // Jika insert gagal, set session error dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['error'] = "Data gagal ditambahkan";
    header("location:../../obat/create.php");
    exit();
}

?>