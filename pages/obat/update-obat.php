<?php

include '../../config/koneksi.php';

if (isset($_POST['id'])) {

    $id = $_POST['id'];
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
        $update = "UPDATE produk SET kode_obat = '$kode_obat', nama_obat = '$nama_obat', kategori_id = '$kategori', satuan_id = '$satuan', stock = '$stock', harga = '$harga', biaya_penyimpanan = '$biaya_penyimpanan', sup_id = '$supplier', keterangan = '$keterangan' WHERE id = '$id'";
        $query = mysqli_query($conn, $update);

        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Data obat berhasil diupdate'
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'Data obat gagal diupdate'
            );

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
}

?>