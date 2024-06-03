<?php

include '../../config/koneksi.php';

$kode_obat = $_POST['kode_obat'];
$nama_obat = $_POST['nama_obat'];
$supplier  = $_POST['supplier'];
$kategori  = $_POST['kategori'];
$satuan    = $_POST['satuan'];
$stock     = $_POST['stock'];
$harga     = $_POST['harga'];
$biaya_penyimpanan = $_POST['biaya_penyimpanan'];
$keterangan = $_POST['keterangan'];

$harga = str_replace(".", "", $harga);
$biaya_penyimpanan = str_replace(".", "", $biaya_penyimpanan);

if ($kode_obat == '' || $nama_obat == '' || $supplier == '' || $kategori == '' || $satuan == '' || $stock == '' || $harga == '' || $biaya_penyimpanan == '') {
    //kembalikan data dalam bentuk json
    $response = array(
        'status' => 'error',
        'message' => 'Data tidak boleh ada yang kosong'
    );
} else {

    $sql = "INSERT INTO produk (kode_obat, nama_obat, kategori_id, satuan_id, stock, harga, biaya_penyimpanan, sup_id, keterangan) VALUES('$kode_obat', '$nama_obat', '$kategori', '$satuan', '$stock', '$harga', '$biaya_penyimpanan', '$supplier', '$keterangan')";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $response = array(
            'status' => 'success',
            'message' => 'Data obat berhasil ditambahkan'
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Data obat gagal ditambahkan'
        );

        header('Content-Type: application/json'); 
        echo json_encode($response);
    } 
}
?>