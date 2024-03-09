<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Supplier - APT Yurikha Farma</title>
    <link href="../css/datatables.bootstrap.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/bootsrap.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- jquery -->
    <link href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css" />
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<?php session_start(); ?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../index.php">APT. Yurikha Farma</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="../index.php">
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
                                <a class="nav-link" href="supplier.php">
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
                        <a class="nav-link" href="transaksi-pembelian.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                            Transaksi Pembelian
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-archive"></i></div>
                            Data Pembelian
                        </a>
                        <a class="nav-link" href="transaksi-penjualan.php">
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
                    <h6 class="mt-4">SUPPLIER</h6>
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
                    ?>
                    <ol class="breadcrumb mb-4"></ol>
                    <div class="row">
                        <div class="section_content section_content--p30">
                            <div class="card mb-3 shadow">
                                <div class="card-header bg-primary text-white">
                                    <i class="fas fa-user text-white"></i>
                                    Tambah Supplier
                                </div>
                                <div class="card-body">
                                    <?php
                                    function generateKodeSupplier() {
                                        $prefix = 'KD-SUP';
                                        $random_number = mt_rand(0, 999999);
                                        $random_number_padded = str_pad($random_number, 6, '0', STR_PAD_LEFT);
                                        $supplier_code = $prefix . $random_number_padded;
                                        return $supplier_code;
                                    }
                                    ?>
                                    <form action="../function/supplier/save.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="kode_sup" name="kode_sup"
                                                value="<?= generateKodeSupplier(); ?>" type="text" readonly required />
                                            <label for="kode_sup">KD-Supplier</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nama_sup" name="nama_sup" type="text"
                                                placeholder="nameexample" required />
                                            <label for="nama_sup">Nama Supplier</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="alamat" name="alamat" required></textarea>
                                            <label for="alamat">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="no_hp" name="no_hp" type="text"
                                                placeholder="nameexample" min="11" max="12" required />
                                            <label for="no_hp">No Hp</label>
                                        </div>
                                        <button type="submit" class="btn btn-xs btn-primary btn-sm">Tambah <i
                                                class="bi bi-save"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-4 shadow">
                        <div class="card-header">
                            <i class="fas fa-address-book me-1"></i>
                            Data Supplier
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-supp" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Supplier</th>
                                            <th>Nama Supplier</th>
                                            <th>Alamat</th>
                                            <th>No Hp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- Query php -->
                                        <?php
                                            include '../koneksi.php';

                                            $no = 1;

                                            $data = mysqli_query(
                                                $koneksi,
                                                "SELECT * FROM supplier ORDER BY id DESC"
                                            );
                                            while ($item = mysqli_fetch_array($data)){
                                            
                                        ?>

                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $item['kode_sup'] ?></td>
                                            <td><?php echo $item['nama_sup'] ?></td>
                                            <td><?php echo $item['alamat'] ?></td>
                                            <td><?php echo $item['no_hp'] ?></td>
                                            <td>
                                                <a class="btn btn-xs btn-warning btn-sm"
                                                    href="../supplier/edit.php?id=<?php echo $item['id'] ?>">Edit</a>
                                                <a class="btn btn-xs btn-danger btn-sm"
                                                    onclick="confirmDelete(<?php echo $item['id'] ?>)">
                                                    Hapus
                                                </a>
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
                    window.location.href = '../function/supplier/delete.php?id=' + id;
                }
            });
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#data-supp').DataTable();
        });
    </script>
</body>

</html>