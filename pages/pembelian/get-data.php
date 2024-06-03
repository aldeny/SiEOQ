<?php
    include '../../config/koneksi.php';

    // Query untuk mendapatkan data obat
    $query = "SELECT p.id, p.kode_obat, p.nama_obat, p.harga, p.stock, p.satuan_id, s.nama_satuan FROM produk as p JOIN satuan as s ON p.satuan_id = s.id ORDER BY p.id DESC;";

    $result = mysqli_query($conn, $query);

    // Inisialisasi array untuk menyimpan data obat
    $datas = array();

    // Ambil data obat dari hasil query
    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
    }

    // Keluarkan data obat dalam format JSON
    echo json_encode($datas);

    // Tutup conn
    mysqli_close($conn);
?>