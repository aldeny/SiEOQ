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
    <title>Obat - apt yurikha farma</title>
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
                                        <a class="nav-link" href="index.php">Data Obat</a>
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
                        <a class="nav-link" href="../penjualan/index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                            Transaksi Penjualan
                        </a>
                        <a class="nav-link" href="charts.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-archive"></i></div>
                            Data Penjualan
                        </a>
                        <a class="nav-link active collapsed" href="laporan.php" data-bs-toggle="collapse"
                            data-bs-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Laporan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse show" id="collapseLaporan" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav" id="sidenavAccordionLaporan">
                                <a class="nav-link active" href="report-obat.php">
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
                    <h6 class="mt-4">REPORT LAPORAN OBAT</h6>
                    <ol class="breadcrumb mb-4"></ol>
                    <div class="card mb-4 shadow">
                        <div class="card-header">
                            <i class="fas fa-address-book me-1"></i>
                            Data Obat
                        </div>
                        <div class="card-body">
                            <a href="../function/exports/data-obat-exel.php"
                                class="btn btn-sm btn-success text-white mb-4"><i
                                    class="bi bi-file-earmark-spreadsheet"></i>
                                Export Excel</a>
                            <a href="../function/exports/data-obat-pdf.php" class="btn btn-sm btn-dark text-white mb-4"
                                target="_blank"><i class="bi bi-filetype-pdf"></i>
                                Export Pdf</a>
                            <table id="data-obat" class="table table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Obat</th>
                                        <th>Nama Obat</th>
                                        <th>Harga</th>
                                        <th>Stock</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Query php -->
                                    <?php
                                        include '../koneksi.php';

                                        $no = 1;

                                        $data = mysqli_query(
                                            $koneksi,
                                            "SELECT p.id, p.nama_obat, p.kode_obat, p.stock, p.harga, p.keterangan, k.nama_kategori, s.nama_satuan, sup.nama_sup 
                                            FROM produk as p 
                                            JOIN kategori AS k ON p.kategori_id = k.id
                                            JOIN satuan AS s ON p.satuan_id = s.id 
                                            JOIN supplier AS sup ON p.sup_id = sup.id;"
                                        );
                                        while ($item = mysqli_fetch_array($data)){
                                            
                                    ?>

                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $item['kode_obat'] ?></td>
                                        <td><?php echo $item['nama_obat'] ?></td>
                                        <td><?php echo 'Rp ' . number_format($item['harga'], 0, ',', '.'); ?></td>
                                        <td><?php echo $item['stock'] ?></td>
                                        <td><?php echo $item['nama_satuan'] ?></td>
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
                            <h5 class="modal-title fw-bold" id="staticBackdropLabel">Detail Produk/Obat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Konten modal -->
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tbody id="detailTableBody">
                                    <!-- Baris-baris tabel akan ditambahkan di sini -->
                                </tbody>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

    <?php if(@$_SESSION['sukses']){ ?>

    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'data berhasil dihapus',
            timer: 3000,
            showConfirmButton: false
        })
    </script>
    <!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat do refresh -->
    <?php unset($_SESSION['sukses']); } ?>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman penghapusan data jika dikonfirmasi
                    window.location.href = '../function/obat/delete.php?id=' + id;
                }
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#data-obat').DataTable();

            $('.btn-detail').click(function () {
                var id = $(this).data('id');

                $.ajax({
                    url: '../function/obat/detail.php',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    dataType: 'json', // Tentukan tipe data yang diharapkan
                    success: function (response) {
                        // Periksa jika tidak ada kesalahan dalam respons
                        if (!response.error) {
                            // Hapus baris-baris sebelumnya jika ada
                            $('#detailTableBody').empty();
                            // Tambahkan baris-baris baru ke dalam tabel
                            $('#detailTableBody').append(
                                '<tr><td>Kode Obat</td><td>' + response.kode_obat +
                                '</td></tr>' +
                                '<tr><td>Nama Obat</td><td>' + response.nama_obat +
                                '</td></tr>' +
                                '<tr><td>Harga</td><td>' + formatRupiah(response
                                    .harga) +
                                '</td></tr>' +
                                '<tr><td>Stock</td><td>' + response.stock +
                                '</td></tr>' +
                                '<tr><td>Satuan</td><td>' + response.satuan +
                                '</td></tr>' +
                                '<tr><td>Nama Kategori</td><td>' + response
                                .nama_kategori +
                                '</td></tr>' +
                                '<tr><td>Nama Supplier</td><td>' + response
                                .nama_sup +
                                '</td></tr>' +
                                '<tr><td>Keterangan</td><td>' + response
                                .keterangan +
                                '</td></tr>');
                            // Tampilkan modal
                            $('#detailModal').modal('show');
                        } else {
                            // Tampilkan pesan kesalahan jika ada
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
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