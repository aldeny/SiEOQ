<?php

// memanggil library FPDF
require('../../library/fpdf/fpdf.php');
include '../../config/koneksi.php';
 
// intance object dan memberikan pengaturan halaman PDF

$pdf=new FPDF('L','mm','LEGAL');
$pdf->AddPage();
 
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'DATA TRANSAKSI PEMBELIAN',0,1,'C');
$pdf->Cell(0,5,'',0,1);

$pdf->Cell(35,10,'Tanggal Export',0,0,);
$pdf->Cell(3,10,':',0,0,'C');
$pdf->Cell(30,10,date('d-m-Y'),0,1,'C');

$pdf->Cell(0,5,'',0,1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(10,7,'NO',1,0,'C');
$pdf->Cell(45,7,'KODE TRANSAKSI' ,1,0,'C');
$pdf->Cell(30,7,'USER' ,1,0,'C');
$pdf->Cell(30,7,'KODE PRODUK' ,1,0,'C');
$pdf->Cell(55,7,'NAMA PRODUK' ,1,0,'C');
$pdf->Cell(20,7,'SATUAN',1,0,'C');
$pdf->Cell(30,7,'HARGA' ,1,0,'C');
$pdf->Cell(20,7,'STOCK IN' ,1,0,'C');
$pdf->Cell(30,7,'TOTAL' ,1,0,'C');
$pdf->Cell(35,7,'SUPPLIER',1,0,'C');
$pdf->Cell(30,7,'TANGGAL',1,1,'C');
// $pdf->Cell(10,7,'TOTAL KESELURUHAN',1,1,'C');
 
$pdf->SetFont('Arial','',10);
$no=1;

$totalHargaKeseluruhan = 0; 

if (isset($_GET['dari']) && isset($_GET['sampai'])) {
  $dari = $_GET['dari'];
  $sampai = $_GET['sampai'];
  
  $sql = mysqli_query($conn, 
  "SELECT tp.id, tp.kode_transaksi, tp.tanggal, u.nama, tp.keterangan, p.nama_obat, p.kode_obat, s.nama_satuan, tp.harga, tp.stock_in, tp.total_harga, sup.nama_sup
  FROM transaksi_pembelian AS tp 
  INNER JOIN produk AS p ON tp.produk_id = p.id
  INNER JOIN user AS u ON tp.user_id = u.id
  INNER JOIN satuan AS s ON tp.satuan_id = s.id
  INNER JOIN supplier AS sup ON tp.sup_id = sup.id
  WHERE tp.tanggal BETWEEN '$dari' AND '$sampai'
  ORDER BY tp.tanggal DESC");

while($d = mysqli_fetch_array($sql)){
  $pdf->Cell(10,6, $no++,1,0,'C');
  $pdf->Cell(45,6, $d['kode_transaksi'],1,0,'C');
  $pdf->Cell(30,6, $d['nama'],1,0,'C');
  $pdf->Cell(30,6, $d['kode_obat'],1,0,'C');  
  $pdf->Cell(55,6, $d['nama_obat'],1,0,'C');  
  $pdf->Cell(20,6, $d['nama_satuan'],1,0,'C');  
  $pdf->Cell(30,6, 'Rp ' . number_format($d['harga'], 0, ',', '.'),1,0,'C');
  $pdf->Cell(20,6, $d['stock_in'],1,0,'C');
  $pdf->Cell(30,6, 'Rp ' . number_format($d['total_harga'], 0, ',', '.'),1,0,'C');
  $pdf->Cell(35,6, $d['nama_sup'],1,0,'C');
  $pdf->Cell(30,6, $d['tanggal'],1,0,'C');
  $pdf->Cell(0,6,'',0,1); // Line break
  
  // Menghitung total harga keseluruhan
  $totalHargaKeseluruhan += $d['total_harga'];
}
$pdf->Cell(240,7,'TOTAL KESELURUHAN',1,0,'C');
$pdf->Cell(30,7,'Rp ' . number_format($totalHargaKeseluruhan, 0, ',', '.'),1,1,'C');
}

$pdf->Output();

?>