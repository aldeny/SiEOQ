<?php

include '../../koneksi.php';

$id = $_POST['id'];
$nama_satuan = $_POST['nama_satuan'];
$keterangan = $_POST['keterangan'];

// Periksa apakah nama satuan sudah ada di database selain data yang sedang diupdate
$validate = mysqli_query(
    $koneksi, "SELECT COUNT(*) AS jumlah_satuan FROM satuan WHERE nama_satuan = '$nama_satuan' AND id != $id"
);

$check = mysqli_fetch_array($validate);

if ($check['jumlah_satuan'] > 0) {
    // Jika satuan sudah ada, tampilkan pesan dan kembali ke halaman sebelumnya
    session_start();
    $_SESSION['error'] = "satuan sudah ada";
    header("location:../../satuan/index.php");
    exit();
} else {
    // Jika satuan belum ada, lakukan proses update data
    $update = mysqli_query($koneksi, "UPDATE satuan SET nama_satuan = '$nama_satuan', keterangan = '$keterangan' WHERE id = '$id'");

    if ($update) {
        // Jika update berhasil, set session success dan kembali ke halaman sebelumnya
        session_start();
        $_SESSION['success'] = "Data berhasil diperbarui";
        header("location:../../satuan/index.php");
        exit();
    } else {
        // Jika update gagal, set session error dan kembali ke halaman sebelumnya
        session_start();
        $_SESSION['error'] = "Data gagal diperbarui";
        header("location:../../satuan/index.php");
        exit();
    }
}

?>