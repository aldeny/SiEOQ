<?php

// Include file koneksi.php untuk menghubungkan ke database
include '../../config/koneksi.php';

// Query untuk mengambil data siswa
$sql = "SELECT p.id, p.nama_obat, p.kode_obat, p.stock, p.harga, p.biaya_penyimpanan, p.keterangan, k.nama_kategori, s.nama_satuan, sup.nama_sup 
FROM produk as p 
JOIN kategori AS k ON p.kategori_id = k.id
JOIN satuan AS s ON p.satuan_id = s.id 
JOIN supplier AS sup ON p.sup_id = sup.id
ORDER BY p.id DESC";
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
            'kode_obat' => $row['kode_obat'],
            'nama_obat' => $row['nama_obat'],
            'harga'     => 'Rp. ' . number_format($row['harga'], 0, ',', '.'),
            'stok'      => $row['stock'],
            'satuan'    => $row['nama_satuan'],
            'biaya_simpan' => 'Rp. ' . number_format($row['biaya_penyimpanan'], 0, ',', '.'),
            'aksi' => '<a href="javascript:void(0)" id="btn-edit" class="btn btn-sm btn-outline-primary btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" data-id="' . $row['id'] . '"><i class="fas fa-edit"></i></a>' .
            '<a href="javascript:void(0)" id="btn-detail" class="btn btn-sm btn-outline-info btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Detail" data-id="' . $row['id'] . '"><i class="fas fa-eye"></i></a>'.
            '<a href="javascript:void(0)" id="btn-hapus" class="btn btn-sm btn-outline-danger btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus" data-id="' . $row['id'] . '"><i class="fas fa-trash"></i></a>'
        );
    }

    // Mengirimkan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode(array('data' => $data));
} else {
    // Jika tidak ada permintaan Ajax, tampilkan halaman dengan data siswa
    $students = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $students[] = $row;
    }
    include 'index.php'; // Ganti dengan lokasi file halaman yang sesuai
}

// Menutup koneksi
mysqli_close($conn);