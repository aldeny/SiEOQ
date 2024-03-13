<?php

include '../../koneksi.php';

$id = $_POST['id'];
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
$stock_old = $_POST['stock_old'];

//hilangkan tanda pemisah harga
$harga = str_replace(".", "", $harga);
$total = str_replace(".", "", $total);

$update = mysqli_query($koneksi, "UPDATE transaksi_pembelian SET produk_id = '$obat_id', stock_in = '$stock_in', satuan_id = '$satuan_id', sup_id = '$supplier_id', harga = '$harga', total_harga = '$total', keterangan = '$keterangan' WHERE id = '$id'");

if ($update) {

    //detele jumlah stock lama
    $old_stock = mysqli_query($koneksi, "UPDATE produk SET stock = stock-'$stock_old' WHERE id = '$obat_id'");

    //update stock
    $new_stock = mysqli_query($koneksi, "UPDATE produk SET stock = stock+'$stock_in' WHERE id = '$obat_id'");

    // Jika update berhasil, set session success dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['success'] = "Data berhasil diperbarui";
    header("location:../../pembelian/index.php");
    exit();
} else {
    // Jika update gagal, set session error dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['error'] = "Data gagal diperbarui";
    header("location:../../pembelian/create.php");
    exit();
}

?>