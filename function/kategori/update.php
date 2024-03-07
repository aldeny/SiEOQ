<?php

include '../../koneksi.php';

$id = $_POST['id'];
$nama_kategori = $_POST['nama_kategori'];
$keterangan = $_POST['keterangan'];

// Periksa apakah nama kategori sudah ada di database selain data yang sedang diupdate
$validate = mysqli_query(
    $koneksi, "SELECT COUNT(*) AS jumlah_kategori FROM kategori WHERE nama_kategori = '$nama_kategori' AND id != $id"
);

$check = mysqli_fetch_array($validate);

if ($check['jumlah_kategori'] > 0) {
    // Jika kategori sudah ada, tampilkan pesan dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['error'] = "Kategori sudah ada";
    header("location:../../kategori-obat/index.php");
    exit();
} else {
    // Jika kategori belum ada, lakukan proses update data
    $update = mysqli_query($koneksi, "UPDATE kategori SET nama_kategori = '$nama_kategori', keterangan = '$keterangan' WHERE id = '$id'");

    if ($update) {
        // Jika update berhasil, set session success dan kembali ke halaman sebelumnya
        session_start();
        $_SESSION['success'] = "Data berhasil diperbarui";
        header("location:../../kategori-obat/index.php");
        exit();
    } else {
        // Jika update gagal, set session error dan kembali ke halaman sebelumnya
        session_start();
        $_SESSION['error'] = "Data gagal diperbarui";
        header("location:../../kategori-obat/index.php");
        exit();
    }
}

?>