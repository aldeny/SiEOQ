<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EOQ - Laporan Penjualan</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="../../css/sweetalert2.min.css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                <?php if ($_SESSION['role'] == 1) { ?> href="../apoteker/dashboard.php" <?php } else { ?>
                href="../admin/dashboard.php" <?php } ?>>
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="sidebar-brand-text mx-3">EOQ</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" <?php if ($_SESSION['role'] == 1) { ?> href="../apoteker/dashboard.php"
                    <?php } else { ?> href="../admin/dashboard.php" <?php } ?>>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if ($_SESSION['role'] == 2) { ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master:</h6>
                        <a class="collapse-item" href="../supplier/index.php">Supplier</a>
                        <a class="collapse-item" href="../obat/index.php">Obat / Produk</a>
                        <a class="collapse-item" href="../kategori/index.php">Kategori</a>
                        <a class="collapse-item" href="index.php">Satuan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../pembelian/index.php">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Pembelian</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../penjualan/index.php">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Penjualan</span></a>
            </li>

            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reports
            </div>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report" aria-expanded="true"
                    aria-controls="report">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Laporan</span>
                </a>
                <div id="report" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan:</h6>
                        <a class="collapse-item" href="../laporan/laporan_obat.php">Laporan Obat</a>
                        <a class="collapse-item" href="../laporan/laporan_pembelian.php">Laporan Pembelian</a>
                        <a class="collapse-item" href="laporan_penjualan.php">Laporan Penjualan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                EOQ
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../eoq/index.php">
                    <i class="fas fa-fw fa-chart-pie"></i>
                    <span>Economic Order Quantity</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small text-capitalize"><?= $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Penjualan</h1>
                    </div>

                    <!-- Content -->
                    <div class="card shadow">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Penjualan</h6>
                        </div>

                        <?php

                            include '../../config/koneksi.php';

                            if (isset($_GET['dari']) && isset($_GET['sampai'])) {
                                $dari = $_GET['dari'];
                                $sampai = $_GET['sampai'];

                                $query = mysqli_query($conn, 
                                "SELECT tp.id, tp.kd_transaksi, tp.tanggal, u.nama, tp.keterangan 
                                FROM transaksi_penjualan AS tp 
                                INNER JOIN produk AS p ON tp.produk_id = p.id
                                INNER JOIN user AS u ON tp.user_id = u.id
                                INNER JOIN satuan AS s ON tp.satuan_id = s.id
                                INNER JOIN supplier AS sup ON tp.sup_id = sup.id
                                WHERE tp.tanggal BETWEEN '$dari' AND '$sampai'
                                GROUP BY tp.kd_transaksi
                                ORDER BY tp.tanggal DESC");

                            } else {
                                $query = mysqli_query($conn, 
                                "SELECT tp.id, tp.kd_transaksi, tp.tanggal, u.nama, tp.keterangan 
                                FROM transaksi_penjualan AS tp 
                                INNER JOIN produk AS p ON tp.produk_id = p.id
                                INNER JOIN user AS u ON tp.user_id = u.id
                                INNER JOIN satuan AS s ON tp.satuan_id = s.id
                                INNER JOIN supplier AS sup ON tp.sup_id = sup.id
                                GROUP BY tp.kd_transaksi
                                ORDER BY tp.tanggal DESC");
                            }

                        ?>

                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="dari" class="form-label">Dari</label>
                                            <input type="date" class="form-control" id="dari" name="dari">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="sampai" class="form-label">Sampai</label>
                                            <input type="date" class="form-control" id="sampai" name="sampai">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary mb-4">Cari</button>
                                <a href="laporan_penjualan.php" class="btn btn-sm btn-dark text-white mb-4">Reset</a>
                                <a href="../reports/export-penjualan-excel.php?dari=<?= $dari ?>&sampai=<?= $sampai ?>"
                                    class="btn btn-sm btn-success text-white mb-4"><i class="fas fa-file-excel"></i>
                                    Export Excel</a>
                                <a href="../reports/export-penjualan-pdf.php?dari=<?= $dari ?>&sampai=<?= $sampai ?>"
                                    class="btn btn-sm btn-dark text-white mb-4" target="_blank"><i
                                        class="fas fa-file-pdf"></i>
                                    Export Pdf</a>
                            </form>
                            <div class="mt-3">
                                <table class="table table-bordered" id="tblPenjualan" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>KD Transaksi</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>PIC</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                        <tr>
                                            <td><?= $data['kd_transaksi'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['keterangan'] ?></td>
                                            <td><a class="btn btn-info btn-sm" id="btn-detail"
                                                    data-kode="<?= $data['kd_transaksi'] ?>">Detail</a></td>
                                        </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>KD Transaksi</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>PIC</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End of Content -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="../auth/endSession.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h6 class="modal-title title text-white" id="staticBackdropLabel"></h6>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Konten modal -->
                <div class="modal-body">
                    <table class="table table-borderless mb-4 w-auto">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td>Kode Transaksi</td>
                                <td>:</td>
                                <td class="font-weight-bold"><span id="kodeTransaksi"></span></td>
                            </tr>
                            <tr>
                                <td>Tanggal Transaksi</td>
                                <td>:</td>
                                <td class="font-weight-bold"><span id="tglTransaksi"></span></td>
                            </tr>
                            <tr>
                                <td>User PIC</td>
                                <td>:</td>
                                <td class="font-weight-bold"><span id="pic"></span></td>
                            </tr>
                            <tr>
                                <td>Supplier</td>
                                <td>:</td>
                                <td class="font-weight-bold"><span id="supplier"></span></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td class="font-weight-bold"><span id="keterangan"></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" id="detailTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Stock Masuk</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="detailTableBody">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center font-weight-bold" colspan="4">Total Harga</td>
                                <td class="font-weight-bold" colspan="1" id="totalHarga"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Sweet Alert -->
    <script src="../../js/sweetalert2.all.min.js"></script>

    <!-- Script untuk fungsi crud -->
    <script>
        $(document).ready(function () {
            $('#tblPenjualan').DataTable({
                //membuat urutan berdasarkan tanggal terbaru
                order: [
                    [0, 'desc']
                ]
            });

        });

        $(document).on('click', '#btn-detail', function () {
            var kode = $(this).data('kode');

            $.ajax({
                url: '../penjualan/detail-penjualan.php',
                type: 'POST',
                data: {
                    kode: kode
                },
                dataType: 'json',
                success: function (data) {

                    var tgl = new Date(data[0].tanggal);
                    var dd = String(tgl.getDate()).padStart(2, '0');
                    var mm = String(tgl.getMonth() + 1).padStart(2,
                        '0'); // +1 karena Januari dimulai dari 0
                    var yyyy = tgl.getFullYear();
                    var formattedDate = dd + '-' + mm + '-' + yyyy;

                    // Mengisi data ke dalam tabel detail
                    $('#detailModal').modal('show');
                    $('.title').html('Detail Transaksi Pembelian');
                    $('#kodeTransaksi').html(data[0].kd_transaksi);
                    $('#tglTransaksi').html(formattedDate);
                    $('#pic').html(data[0].nama);
                    if (!data[0].keterangan) {
                        $('#keterangan').html('Tidak ada keterangan');
                    } else {
                        $('#keterangan').html(data[0].keterangan);
                    }
                    $('#supplier').html(data[0].kode_sup + ' - ' + data[0].nama_sup);

                    // Membuat variabel untuk menyimpan hasil yang akan ditampilkan
                    var tableRows = '';
                    var no = 1;
                    var totalHarga = 0;

                    // Loop untuk setiap baris data yang diterima
                    for (var i = 0; i < data.length; i++) {
                        var rowData = data[i];



                        // Menambahkan baris data ke variabel tableRows
                        tableRows += '<tr>';
                        tableRows += '<td>' + no++ + '</td>';
                        tableRows += '<td>' + rowData.nama_obat + '</td>';
                        tableRows += '<td>' + rowData.stock_out + ' ' + rowData
                            .nama_satuan + '</td>';
                        tableRows += '<td>' + rowData.harga + '</td>';
                        tableRows += '<td>' + rowData.total_harga + '</td>';
                        tableRows += '</tr>';

                        totalHarga += parseFloat(rowData.total_harga);
                    }

                    // Memasukkan baris-baris data ke dalam tabel dengan id 'detailTable'
                    $('#detailTable tbody').html(tableRows);

                    // Menampilkan total harga pada bagian akhir tabel
                    $('#totalHarga').html(formatRupiah(totalHarga,
                        'Rp '));
                }
            });
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }
    </script>

</body>

</html>