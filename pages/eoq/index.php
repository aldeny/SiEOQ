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

    <title>EOQ</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin/dashboard.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="sidebar-brand-text mx-3">EOQ</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../admin/dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

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
                        <a class="collapse-item" href="index.php">Obat / Produk</a>
                        <a class="collapse-item" href="../kategori/index.php">Kategori</a>
                        <a class="collapse-item" href="../satuan/index.php">Satuan</a>
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

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Reports
            </div>

            <li class="nav-item">
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
                        <a class="collapse-item" href="../laporan/laporan_penjualan.php">Laporan Penjualan</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                EOQ
            </div>

            <li class="nav-item active">
                <a class="nav-link" href="index.php">
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
                        <h1 class="h4 mb-0 text-gray-800 font-weight-bold text-uppercase">EOQ</h1>
                    </div>

                    <!-- Content -->
                    <div class="card mb-4">
                        <div class="card-header ">
                            <i class="bi bi-receipt-cutoff"></i>
                            Data EOQ
                        </div>
                        <div class="card-body">
                            <form id="dataForm" action="proses.php" method="GET">
                                <!-- Tambahkan elemen untuk menampilkan tabel -->
                                <div id="dataContainer"></div>
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
                                <button type="submit" class="btn btn-sm btn-primary mb-4">Proses Data</button>
                            </form>

                            <div id="result" style="display: none;">
                                <table class="table table-bordered">
                                    <h6>A. Metode Always Beter Control (ABC)</h6>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Obat</th>
                                            <th>Jenis</th>
                                            <th>Jumlah Pakai</th>
                                            <th>Harga Satuan</th>
                                            <th>Pendapatan</th>
                                            <th>% Pendapatan</th>
                                            <th>% Kamulatif</th>
                                            <th>Kelompok</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-table">
                                    </tbody>
                                </table>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelompok</th>
                                            <th>Total Obat</th>
                                            <th>Persentasi (%)</th>
                                            <th>Pendapatan (Rp)</th>
                                            <th>Persentasi Pendapatan (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-kelompok">
                                    </tbody>
                                </table>

                                <h6>B. Metode EOQ</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Total Obat</th>
                                            <th>Biaya Pemesanan Obat</th>
                                            <th>Biaya Penyimpanan Obat</th>
                                            <th>EOQ</th>
                                            <th>P (Kali)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-eoq">
                                    </tbody>
                                </table>

                                <h6>C. Safty Stock dan ROP</h6>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Total Pakai</th>
                                            <th>Rata-rata / Hari</th>
                                            <th>Lead Time</th>
                                            <th>Service Level (95%)</th>
                                            <th>Safty Stock</th>
                                            <th>ROP</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-ss">
                                    </tbody>
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
            $('#dataForm').submit(function (event) {
                event.preventDefault(); // Menghentikan submit form default

                // Mengirimkan permintaan AJAX
                $.ajax({
                    type: 'GET',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        $("#result").show();
                        var data = response.data;
                        var totalPendapatan = response.total_pendapatan;
                        var persenPendapatan = response.persen_pendapatan;
                        var komulatif = response.komulatif;
                        var gradeKomulatif = response.grade_komulatif;
                        var totalGradeSama = response.total_komulatif_sama;
                        var totalKomulatif = response.total_komulatif;
                        var total_pendapatan_per_grade = response
                            .total_pendapatan_per_grade;
                        var persen_pendapatan_kelompok = response
                            .persen_pendapatan_kelompok;
                        var data_grade_A = response.data_grade_A;
                        var data_eoq = response.data_eoq;
                        var data_p = response.data_p;


                        var tableBody = $('#data-table');
                        var tableKelompok = $('#data-kelompok');
                        var tableEoq = $('#data-eoq');
                        var tableSs = $('#data-ss');
                        //buat format rupiah
                        var formatter = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0
                        });
                        var html = '';
                        var kel = '';
                        var eoq = '';
                        var ss = '';

                        // Loop melalui data dan tambahkan ke tabel
                        $.each(data, function (index, item) {
                            html += '<tr>';
                            // untuk nomor
                            html += '<td>' + (index + 1) + '</td>';
                            html += '<td>' + item.nama_obat + '</td>';
                            html += '<td>' + item.nama_satuan + '</td>';
                            html += '<td>' + item.stock_out + '</td>';
                            html += '<td>' + formatter.format(item.harga) +
                                '</td>';
                            html += '<td>' + formatter.format(item.pendapatan) +
                                '</td>';
                            html += '<td>' + persenPendapatan[index] + '</td>';
                            html += '<td>' + komulatif[index] + '</td>';
                            html += '<td>' + gradeKomulatif[index] + '</td>';
                            html += '</tr>';
                        });

                        // Tambahkan total pendapatan, persentase pendapatan, kolom komulatif, dan grade komulatif
                        html += '<tr>';
                        html +=
                            '<td class="fw-bold text-center" colspan="5">Total Pendapatan:</td>';
                        html += '<td >' + formatter.format(totalPendapatan) +
                            '</td>';
                        html += '</tr>';

                        // looping table kelompok

                        $no = 1;
                        $.each(totalGradeSama, function (index, k) {
                            kel += '<tr>';
                            kel += '<td>' + $no++ + '</td>';
                            kel += '<td>' + index + '</td>';
                            kel += '<td>' + k + '</td>';
                            //persentasi kelompok dalam persen dengan 2 angka di belakang koma
                            kel += '<td>' + (k / totalKomulatif * 100).toFixed(
                                2) + '%</td>';
                            kel += '<td>' + formatter.format(
                                    total_pendapatan_per_grade[index]) +
                                '</td>';
                            kel += '<td>' + persen_pendapatan_kelompok[index]
                                .toFixed(2) +
                                '%</td>';
                            kel += '</tr>';
                        })

                        kel += '<tr>';
                        kel +=
                            '<td class="fw-bold text-center" colspan="2">Total</td>';
                        kel += '<td >' + totalKomulatif +
                            '</td>';
                        kel += '<td >' + (totalKomulatif / totalKomulatif * 100)
                            .toFixed(
                                2) + '%</td>';
                        kel += '<td >' + formatter.format(
                                totalPendapatan) +
                            '</td>';
                        kel += '<td >' + (totalPendapatan / totalPendapatan * 100)
                            .toFixed(
                                2) + '%</td>';
                        kel += '</tr>';

                        // looping table eoq

                        $no = 1;
                        $.each(data_grade_A, function (index, e) {
                            eoq += '<tr>';
                            eoq += '<td>' + $no++ + '</td>';
                            eoq += '<td>' + e.nama_obat + '</td>';
                            eoq += '<td>' + e.stock_out + '</td>';
                            eoq += '<td> Rp. 50.000 </td>';
                            eoq += '<td>' + formatter.format(e
                                .biaya_penyimpanan) + '</td>';
                            eoq += '<td>' + data_eoq[index] + '</td>';
                            eoq += '<td>' + data_p[index] + '</td>';
                            eoq += '</tr>';
                        })

                        //looping data safty stock dan rop

                        $.each(data_grade_A, function (index, d) {
                            ss += '<tr>';
                            ss += '<td>' + (index + 1) + '</td>';
                            ss += '<td>' + d.nama_obat + '</td>';
                            ss += '<td>' + d.stock_out + '</td>';
                            ss += '<td>' + (d.stock_out / 365).toFixed(2) +
                                '</td>';
                            ss += '<td> 3 </td>';
                            ss += '<td> 1.65 </td>';
                            ss += '<td>' + (1.65 * (d.stock_out / 365) * 3)
                                .toFixed(2) +
                                '</td>';
                            ss += '<td>' + (((d.stock_out / 365) * 3) + (1.65 *
                                    (d.stock_out / 365) * 3)).toFixed(2) +
                                '</td>';
                            ss += '</tr>';
                        })


                        tableBody.html(html);
                        tableKelompok.html(kel);
                        tableEoq.html(eoq);
                        tableSs.html(ss);

                    },

                    error: function (xhr, status, error) {
                        // Penanganan kesalahan jika diperlukan
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Sepertinya terjadi kesalahan. Silakan coba lagi.",
                        });
                    }

                });
            });
        });
    </script>

</body>

</html>