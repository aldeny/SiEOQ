<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>transaksi pembelian- apt yurikha farma</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">APT. Yurikha Farma</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
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
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                                Beranda
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-group"></i></div>
                                Data
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="user.php">
                                        user
                                    </a>
                                    <a class="nav-link" href="supplier.php">
                                        Supplier
                                    </a>
                                    <a class="nav-link" href="obat.php">
                                        Obat
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link" href="transaksi-pembelian.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                                Transaksi Pembelian  
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
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
                            <a class="nav-link" href="laporan.php" data-bs-toggle="collapse" data-bs-target="#collapseLaporan" aria-expanded="false" aria-controls="collapseLaporan">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLaporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
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
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h6 class="mt-4">Transaksi Pembelian Obat APT. Yurikha Farma</h6>
                        <ol class="breadcrumb mb-4"></ol>
                        <div class="row">
                            <div class="section_content section_content--p30">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fas fa-user"></i>
                                        Transaksi Pembelian
                                    </div>
                                    <div class="table-responsive table--no-card m-b-30">
                                        <div class="form group">
                                            <table class="table table-borderless table-earning">
                                                <tbody>
                                                    <tr>
                                                        <td>KD Obat
                                                            <input type="text" class="form-control" name="Obt-oo1" autocomplete="off">
                                                        </td>
                                                        <td>Nama Penginput
                                                            <input type="text" class="form-control" name="name" autocomplete="off">
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Keterangan
                                                            <input type="text" class="form-control" name="Keteranganexample" autocomplete="off">
                                                        </td>
                                                        <td>Supplier
                                                            <input type="text" class="form-control" name="PT.menangisexample" autocomplete="off">
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Satuan
                                                            <input type="text" class="form-control" name="satuantablet" autocomplete="off">
                                                        </td>
                                                        <td>Harga
                                                            <input type="text" class="form-control" name="PT.menangisexample" autocomplete="off">
                                                        </td>
                                                    </tr> 
                                                    <tr>
                                                        <td>Jumlah Masuk
                                                            <input type="tel" class="form-control" name="1,2,3" autocomplete="off">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a class="btn btn-xs btn-warning btn-sm" href="transaksi-pembelian.php">Tambah</a>
                                                            <a class="btn btn-xs btn-dark btn-sm" href="transaksi-pembelian.php">Cancel</a>
                                                        </td>
                                                    </tr>
                                                </tbody>  
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-address-book me-1"></i>
                                Data Transaksi Pembelian
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>KD Obat</th>
                                            <th>Nama Penginput</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Supplier</th>
                                            <th>Ket</th>
                                            <th>KD transaksi</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Query php -->
                                    <?php
                                        include 'koneksi.php';

                                        $no = 1;

                                        $data = mysqli_query(
                                            $koneksi,
                                            "SELECT * FROM transaksi_pembelian"
                                        );
                                        while ($item = mysqli_fetch_array($data)){
                                            
                                    ?>

                                           <tr>
                                                <td><?php echo $item['produk_id'] ?></td>
                                                <td><?php echo $item['user_id'] ?></td>
                                                <td><?php echo $item['satuan_id'] ?></td>
                                                <td><?php echo $item['harga'] ?></td>
                                                <td><?php echo $item['stock_in'] ?></td>
                                                <td><?php echo $item['sup_id'] ?></td>
                                                <td><?php echo $item['keterangan'] ?></td>
                                                <td><?php echo $item['kode_transaksi'] ?></td>
                                                <td><?php echo $item['total_harga'] ?></td>
                                                <td> 
                                                    <a class="btn btn-xs btn-warning btn-sm" href="edit- transaksi pembelian.php">Edit</a>
                                                    <a class="btn btn-xs btn-dark btn-sm" href="transaksi-pembelian.php">Hapus</a>
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
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
