<?php
    include '../../koneksi.php';

    // menangkap data id yang di kirim dari url
    $id = $_GET['id'];

    // gunakan fungsi di bawah ini agar session bisa dibuat
    session_start();

    // mengambil data dari database
    $data = mysqli_query($koneksi,"select * from transaksi_penjualan where id='$id'");
    $result = mysqli_fetch_array($data);

    //update stock
    $update = mysqli_query($koneksi,"update produk set stock=stock+'$result[stock_out]' where id='$result[produk_id]'");

    // menghapus data dari database
    mysqli_query($koneksi,"delete from transaksi_penjualan where id='$id'");

    // set session sukses
    $_SESSION["sukses"] = 'Data Berhasil Dihapus';

    // mengalihkan halaman kembali ke index.php
    header("location:../../penjualan/index.php");
?>