<?php
    session_start();

    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>EOQ - APT. Yurikha Farma</title>
    <link href="../css/datatables.bootstrap.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- jquery -->
    <link href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../admin/dashboard.php">APT. Yurikha Farma</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <ul class="navbar-nav d-flex ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"> <?php echo $_SESSION['name'] ?>
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../function/auth/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="../admin/dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                            Beranda
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-group"></i></div>
                            Data
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="../user/user.php">
                                    User
                                </a>
                                <a class="nav-link" href="../supplier/supplier.php">
                                    Supplier
                                </a>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Obat
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="../obat/index.php">Data Obat</a>
                                        <a class="nav-link" href="../kategori-obat/index.php">Data Kategori</a>
                                        <a class="nav-link" href="../satuan/index.php">Data Satuan</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link" href="../pembelian/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                            Transaksi Pembelian
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-archive"></i></div>
                            Data Pembelian
                        </a>
                        <a class="nav-link active" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                            Transaksi Penjualan
                        </a>
                        <a class="nav-link" href="charts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-archive"></i></div>
                            Data Penjualan
                        </a>
                        <a class="nav-link" href="laporan.php" data-bs-toggle="collapse"
                            data-bs-target="#collapseLaporan" aria-expanded="false" aria-controls="collapseLaporan">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Laporan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLaporan" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav" id="sidenavAccordionLaporan">
                                <a class="nav-link" href="laporan obat.php">
                                    Laporan Obat
                                </a>
                                <a class="nav-link" href="laporan pembelian.php">
                                    Laporan Pembelian
                                </a>
                                <a class="nav-link" href="laporan penjualan.php">
                                    Laporan Penjualan
                                </a>
                                <a class="nav-link" href="index.php">
                                    Economic Order Quantity
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h6 class="mt-4">EQONOMIC ORDER QUANTITY</h6>
                    <ol class="breadcrumb mb-4"></ol>
                    <?php
                        if (isset($_SESSION['success'])) {
                            echo '
                            <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
                                <strong>' . $_SESSION['success'] . '</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                                ';
                            // Hapus pesan notifikasi agar tidak ditampilkan kembali
                            unset($_SESSION['success']);
                        }
                        
                        if (isset($_SESSION['error'])) {
                            echo '
                            <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
                                <strong>' . $_SESSION['success'] . '</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            // Hapus pesan notifikasi agar tidak ditampilkan kembali
                            unset($_SESSION['error']);
                        }

                        include '../koneksi.php';

                        $query = mysqli_query($koneksi, 
                        "SELECT tp.id, tp.kd_transaksi, tp.tanggal, u.nama, tp.keterangan 
                        FROM transaksi_penjualan AS tp 
                        INNER JOIN produk AS p ON tp.produk_id = p.id
                        INNER JOIN user AS u ON tp.user_id = u.id
                        INNER JOIN satuan AS s ON tp.satuan_id = s.id
                        INNER JOIN supplier AS sup ON tp.sup_id = sup.id
                        GROUP BY tp.kd_transaksi
                        ORDER BY tp.tanggal DESC");
                    ?>
                    <div class="card mb-4">
                        <div class="card-header ">
                            <i class="bi bi-receipt-cutoff"></i>
                            Data EOQ
                        </div>
                        <div class="card-body">
                            <form id="dataForm" action="../function/eoq/proses.php" method="GET">
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
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; Uin Suska Riau 2024 - Crafted by Shofika Adilya
                            <i class="far fa-face-grin"></i>
                        </div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="../js/jquery.v371.js"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

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