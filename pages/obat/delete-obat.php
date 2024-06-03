<?php

include '../../config/koneksi.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM produk WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $response = array(
            'status' => 'success',
            'message' => 'Data obat berhasil dihapus'
        );

        // Mengembalikan respons dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($response);

    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Gagal menghapus data obat'
        );
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'ID obat tidak ditemukan'
    );
}

mysqli_close($conn);

?>