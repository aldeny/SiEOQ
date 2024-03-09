<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User - APT Yurikha Farma</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                                <a class="nav-link" href="user.php">
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
                        <a class="nav-link" href="#">
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
                    <h6 class="mt-4">USER</h6>
                    <ol class="breadcrumb mb-4"></ol>
                    <div class="row">
                        <div class="section_content section_content--p30">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-user"></i>
                                    Tambah User
                                </div>
                                <div class="card-body">
                                    <form action="../function/user/user_save.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text"
                                                placeholder="Masukkan Username" />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nama" name="nama" type="text"
                                                placeholder="Masukkan Nama" />
                                            <label for="nama">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password"
                                                placeholder="Masukkan Password" />
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="role_id" name="role_id"
                                                aria-label="Floating label select example">
                                                <option selected>Pilih Role User</option>
                                                <?php
                                                    include '../koneksi.php';
                                                    $query = mysqli_query($koneksi, "SELECT * FROM role");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    
                                                ?>
                                                <option value="<?php echo $data['id'] ?>">
                                                    <?php echo $data['nama_role'] ?>
                                                </option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                            <label for="role_id">Role User</label>
                                        </div>
                                        <button type="submit" class="btn btn-xs btn-primary btn-sm">Tambah <i
                                                class="bi bi-save"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-address-book me-1"></i>
                            Data User
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Hak Akses</th>
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
                                            "SELECT u.*, r.nama_role FROM user as u inner join role as r on u.role_id = r.id"
                                        );
                                        while ($item = mysqli_fetch_array($data)){
                                            
                                    ?>

                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $item['nama'] ?></td>
                                        <td><?php echo $item['username'] ?></td>
                                        <td><?php echo $item['nama_role'] ?></td>
                                        <td>
                                            <a class="btn btn-xs btn-warning btn-sm"
                                                href="../user/edit.php?id=<?php echo $item['id'] ?>">
                                                Edit
                                            </a>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- jangan lupa menambahkan script js sweet alert dibawah ini -->
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
                    window.location.href = 'function/user/user_delete.php?id=' + id;
                }
            });
        }
    </script>

</body>

</html>