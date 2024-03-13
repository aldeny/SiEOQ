<?php
// Lakukan koneksi ke database Anda di sini
include '../../koneksi.php';

if(isset($_POST['obat_id'])) {
    $obat_id = $_POST['obat_id'];
    // Lakukan query ke database Anda untuk mendapatkan satuan berdasarkan obat_id
    // Misalnya:
    $query = "SELECT p.*, s.nama_satuan FROM produk as p INNER JOIN satuan as s on p.satuan_id = s.id WHERE p.id = $obat_id";
    $result = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $response = array(
            'satuan_id' => $row['satuan_id'],
            'nama_satuan' => $row['nama_satuan']
        );
        echo json_encode($response);

    } else {
        echo 'Satuan tidak ditemukan';
    }
}
?>