<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Export Data Penjualan</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="card shadow" style="width: 18rem;">
            <div class="card-header text-center bg-info text-white">
                <h4>Success!</h4>
            </div>
            <div class="card-body text-center">
                <p>Data berhasil di export</p>
                <a href="../laporan/laporan_penjualan.php" class="btn btn-sm bg-secondary w-100 text-white">Back</a>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php
include '../../config/koneksi.php';
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
$sheet->setCellValue('A1', 'NO');
$sheet->setCellValue('B1', 'KODE TRANSAKSI');
$sheet->setCellValue('C1', 'USER');
$sheet->setCellValue('D1', 'KODE PRODUK');
$sheet->setCellValue('E1', 'NAMA PRODUK');
$sheet->setCellValue('F1', 'SATUAN');
$sheet->setCellValue('G1', 'HARGA');
$sheet->setCellValue('H1', 'STOCK OUT');
$sheet->setCellValue('I1', 'TOTAL');
$sheet->setCellValue('J1', 'SUPPLIER');
$sheet->setCellValue('K1', 'TANGGAL');

    $i = 2;
    $no = 1;

    if (isset($_GET['dari']) && isset($_GET['sampai'])) {
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];

        $datas = mysqli_query($conn, 
        "SELECT tp.id, tp.kd_transaksi, tp.tanggal, u.nama, tp.keterangan, p.nama_obat, p.kode_obat, s.nama_satuan, tp.harga, tp.stock_out, tp.total_harga, sup.nama_sup
        FROM transaksi_penjualan AS tp 
        INNER JOIN produk AS p ON tp.produk_id = p.id
        INNER JOIN user AS u ON tp.user_id = u.id
        INNER JOIN satuan AS s ON tp.satuan_id = s.id
        INNER JOIN supplier AS sup ON tp.sup_id = sup.id
        WHERE tp.tanggal BETWEEN '$dari' AND '$sampai'
        ORDER BY tp.tanggal DESC");

        while ($data = mysqli_fetch_assoc($datas)) {
            $sheet->setCellValue('A' . $i, $no++);
            $sheet->setCellValue('B' . $i, $data['kd_transaksi']);
            $sheet->setCellValue('C' . $i, $data['nama']);
            $sheet->setCellValue('D' . $i, $data['kode_obat']);
            $sheet->setCellValue('E' . $i, $data['nama_obat']);
            $sheet->setCellValue('F' . $i, $data['nama_satuan']);
            $sheet->setCellValue('G' . $i, $data['harga']);
            $sheet->setCellValue('H' . $i, $data['stock_out']);
            $sheet->setCellValue('I' . $i, $data['total_harga']);
            $sheet->setCellValue('J' . $i, $data['nama_sup']);
            $sheet->setCellValue('K' . $i, date('d-m-Y', strtotime($data['tanggal'])));
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('Data penjualan.xlsx');
        echo "<script>window.location = 'Data penjualan.xlsx'</script>";

    } 

    $datas = mysqli_query($conn, 
    "SELECT tp.id, tp.kd_transaksi, tp.tanggal, u.nama, tp.keterangan, p.nama_obat, p.kode_obat, s.nama_satuan, tp.harga, tp.stock_out, tp.total_harga
    FROM transaksi_penjualan AS tp 
    INNER JOIN produk AS p ON tp.produk_id = p.id
    INNER JOIN user AS u ON tp.user_id = u.id
    INNER JOIN satuan AS s ON tp.satuan_id = s.id
    INNER JOIN supplier AS sup ON tp.sup_id = sup.id
    GROUP BY tp.kd_transaksi
    ORDER BY tp.tanggal DESC");

    while ($data = mysqli_fetch_assoc($datas)) {
        $sheet->setCellValue('A' . $i, $no++);
        $sheet->setCellValue('B' . $i, $data['kd_transaksi']);
        $sheet->setCellValue('C' . $i, $data['user']);
        $sheet->setCellValue('D' . $i, $data['kode_produk']);
        $sheet->setCellValue('E' . $i, $data['nama_produk']);
        $sheet->setCellValue('F' . $i, $data['satuan']);
        $sheet->setCellValue('G' . $i, $data['harga']);
        $sheet->setCellValue('H' . $i, $data['stock_out']);
        $sheet->setCellValue('I' . $i, $data['total_harga']);
        $sheet->setCellValue('J' . $i, $data['tanggal']);
        $i++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer->save('Data Penjualan all.xlsx');
    echo "<script>window.location = 'Data Penjualan all.xlsx'</script>";

?>