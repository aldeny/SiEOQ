<?php

include '../../koneksi.php';

$nama_satuan = $_POST['nama_satuan'];
$keterangan = $_POST['keterangan'];

// Periksa apakah nama satuan sudah ada di database
$validate = mysqli_query(
    $koneksi, "SELECT COUNT(*) AS jumlah_satuan FROM satuan WHERE nama_satuan = '$nama_satuan'"
);

$check = mysqli_fetch_array($validate);

if ($check['jumlah_satuan'] > 0) {
    // Jika satuan sudah ada, tampilkan pesan dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['error'] = "Satuan sudah ada";
    header("location:../../satuan/index.php");
    exit();
} else {
    // Jika satuan belum ada, lakukan proses insert data
    $insert = mysqli_query($koneksi, "INSERT INTO satuan (nama_satuan, keterangan) VALUES ('$nama_satuan', '$keterangan')");

    if ($insert) {
        // Jika insert berhasil, set session success dan kembali ke halaman sebelumnya
        session_start();
        $_SESSION['success'] = "Data berhasil ditambahkan";
        header("location:../../satuan/index.php");
        exit();
    } else {
        // Jika insert gagal, set session error dan kembali ke halaman sebelumnya
        session_start();
        $_SESSION['error'] = "Data gagal ditambahkan";
        header("location:../../satuan/index.php");
        exit();
    }
}

?>