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
    <title>Penjualan - APT. Yurikha Farma</title>
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
                                <a class="nav-link" href="eoq.php">
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
                    <h6 class="mt-4">PENJUALAN</h6>
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
                            Data Transaksi Penjualan
                        </div>
                        <div class="card-body">
                            <a href="create.php" class="btn btn-sm btn-primary text-white mb-4"><i
                                    class="bi bi-plus-circle-fill"></i>
                                Tambah Transaksi Penjualan</a>
                            <table id="tbl_penjualan" class="table table-bordered nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>KD transaksi</th>
                                        <th>Tgl Penjualan</th>
                                        <th>PIC</th>
                                        <th>Ket</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Query php -->
                                    <?php
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                    <tr>
                                        <td><?= $data['kd_transaksi'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['keterangan'] ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info btn-detail"
                                                data-kode="<?= $data['kd_transaksi'] ?>">Detail</button>
                                        </td>
                                    </tr>

                                    <?php
                                        }
                                        ?>
                                    <!-- End Query php -->

                                </tbody>
                            </table>
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

            <!-- Modal -->
            <div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h6 class="modal-title title" id="staticBackdropLabel"></h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Konten modal -->
                        <div class="modal-body">
                            <table class="table table-borderless mb-4 w-auto">
                                <thead></thead>
                                <tbody>
                                    <tr>
                                        <td>Kode Transaksi</td>
                                        <td>:</td>
                                        <td><span id="kodeTransaksi"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Transaksi</td>
                                        <td>:</td>
                                        <td><span id="tglTransaksi"></span></td>
                                    </tr>
                                    <tr>
                                        <td>User PIC</td>
                                        <td>:</td>
                                        <td><span id="pic"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Supplier</td>
                                        <td>:</td>
                                        <td><span id="supplier"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td><span id="keterangan"></span></td>
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
                                        <td class="text-center fw-bold" colspan="4">Total Harga</td>
                                        <td class="fw-bold" colspan="1" id="totalHarga"></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="../js/jquery.v371.js"></script>
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <scrip src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js">
        </script>

        <script>
            $(document).ready(function () {
                $('#tbl_penjualan').DataTable();

                $(document).on('click', '.btn-detail', function () {
                    var kode = $(this).data('kode');
                    // alert(kode);

                    $.ajax({
                        url: '../function/penjualan/detail.php',
                        type: 'POST',
                        data: {
                            kode: kode // Mengubah 'id' menjadi 'kode' sesuai dengan parameter yang digunakan di PHP
                        },
                        dataType: 'json',
                        success: function (data) {
                            console.log(data);

                            // Mengubah format tanggal
                            var tgl = new Date(data[0].tanggal);
                            var dd = String(tgl.getDate()).padStart(2, '0');
                            var mm = String(tgl.getMonth() + 1).padStart(2,
                                '0'); // +1 karena Januari dimulai dari 0
                            var yyyy = tgl.getFullYear();
                            var formattedDate = dd + '-' + mm + '-' + yyyy;

                            // Mengisi data ke dalam tabel detail
                            $('#detailModal').modal('show');
                            $('.title').html('Detail Transaksi Penjualan');
                            $('#kodeTransaksi').html(data[0].kd_transaksi);
                            $('#tglTransaksi').html(formattedDate);
                            $('#pic').html(data[0].nama);
                            if (!data[0].keterangan) {
                                $('#keterangan').html('Tidak ada keterangan');
                            } else {
                                $('#keterangan').html(data[0].keterangan);
                            }
                            $('#supplier').html(data[0].kode_sup + ' - ' + data[0]
                                .nama_sup);

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
            });

            // Fungsi untuk memformat angka ke dalam format rupiah
            function formatRupiah(angka) {
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }
        </script>

</body>

</html>