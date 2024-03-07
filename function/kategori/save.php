<?php

include '../../koneksi.php';

$nama_kategori = $_POST['nama_kategori'];
$keterangan = $_POST['keterangan'];

// Periksa apakah nama kategori sudah ada di database
$validate = mysqli_query(
    $koneksi, "SELECT COUNT(*) AS jumlah_kategori FROM kategori WHERE nama_kategori = '$nama_kategori'"
);

$check = mysqli_fetch_array($validate);

if ($check['jumlah_kategori'] > 0) {
    // Jika kategori sudah ada, tampilkan pesan dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['error'] = "Kategori sudah ada";
    header("location:../../kategori-obat/index.php");
    exit();
} else {
    // Jika kategori belum ada, lakukan proses insert data
    $insert = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori, keterangan) VALUES ('$nama_kategori', '$keterangan')");

    if ($insert) {
        // Jika insert berhasil, set session success dan kembali ke halaman sebelumnya
        session_start();
        $_SESSION['success'] = "Data berhasil ditambahkan";
        header("location:../../kategori-obat/index.php");
        exit();
    } else {
        // Jika insert gagal, set session error dan kembali ke halaman sebelumnya
        session_start();
        $_SESSION['error'] = "Data gagal ditambahkan";
        header("location:../../kategori-obat/index.php");
        exit();
    }
}

?>