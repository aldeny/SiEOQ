<?php

// Include file koneksi.php untuk menghubungkan ke database
include '../../config/koneksi.php';

// Query untuk mengambil data siswa
$sql = "SELECT tp.id, tp.kd_transaksi, tp.tanggal, u.nama, tp.keterangan 
FROM transaksi_penjualan AS tp 
INNER JOIN produk AS p ON tp.produk_id = p.id
INNER JOIN user AS u ON tp.user_id = u.id
INNER JOIN satuan AS s ON tp.satuan_id = s.id
INNER JOIN supplier AS sup ON tp.sup_id = sup.id
GROUP BY tp.kd_transaksi
ORDER BY tp.tanggal DESC";
$query = mysqli_query($conn, $sql);

// Memeriksa jika query berhasil dieksekusi
if (!$query) {
    die("Gagal menjalankan query: " . mysqli_error($conn));
}

// Memeriksa apakah ada permintaan Ajax
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
        // Memformat data sesuai kebutuhan Anda
        $data[] = array(
            'kode_transaksi' => $row['kd_transaksi'],
            'tanggal' => date('d-m-Y', strtotime($row['tanggal'])),
            'nama' => $row['nama'],
            'keterangan' => $row['keterangan'],
            'aksi' => '<a href="javascript:void(0)" id="btn-detail" class="btn btn-sm btn-outline-info btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail" data-kode="' . $row['kd_transaksi'] . '" data-id="' . $row['id'] . '"><i class="fas fa-eye"></i></a>' 
            // .'<a href="javascript:void(0)" id="btn-print" class="btn btn-sm btn-outline-secondary btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Print" data-id="' . $row['id'] . '"><i class="fas fa-print"></i></a>'
        );
    }

    // Mengirimkan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode(array('data' => $data));
} else {
    // Jika tidak ada permintaan Ajax, tampilkan halaman dengan data siswa
    $data = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
    include 'index.php'; // Ganti dengan lokasi file halaman yang sesuai
}

// Menutup koneksi
mysqli_close($conn);