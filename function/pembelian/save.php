<?php

include '../../koneksi.php';

$kd_transaksi = $_POST['kd_transaksi'];
$tgl = $_POST['tgl'];
$user_id = $_POST['user_id'];
$obat_id = $_POST['obat_id'];
$stock_in = $_POST['stock_in'];
$satuan_id = $_POST['satuan_id'];
$supplier_id = $_POST['supplier_id'];
$harga = $_POST['harga'];
$total = $_POST['total'];
$keterangan = $_POST['keterangan'];

//hilangkan tanda pemisah harga
$harga = str_replace(".", "", $harga);
$total = str_replace(".", "", $total);

$insert = mysqli_query($koneksi, "INSERT INTO transaksi_pembelian 
(produk_id, user_id, satuan_id, harga,stock_in, sup_id, keterangan, kode_transaksi,total_harga,tanggal) VALUES 
('$obat_id', '$user_id', '$satuan_id', '$harga', '$stock_in', '$supplier_id', '$keterangan', '$kd_transaksi', '$total', '$tgl')");

$update_stock = mysqli_query($koneksi, "UPDATE produk SET stock = stock + $stock_in WHERE id = $obat_id");

if ($insert) {
    // Jika insert berhasil, set session success dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['success'] = "Data berhasil ditambahkan";
    header("location:../../pembelian/index.php");
    exit();
} else {
    // Jika insert gagal, set session error dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['error'] = "Data gagal ditambahkan";
    header("location:../../pembelian/create.php");
    exit();
}

?>