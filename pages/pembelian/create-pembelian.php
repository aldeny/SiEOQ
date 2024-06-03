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

    <title>EOQ - Pembelian</title>

    <link rel="stylesheet" href="../../vendor/select2/select2-bootstrap4.css">
    <link rel="stylesheet" href="../../vendor/select2/select2-bootstrap4.min.css">

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

    <!-- Select2 -->
    <link rel="stylesheet" href="../../css/select2.min.css">

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
                        <a class="collapse-item" href="../obat/index.php">Obat / Produk</a>
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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
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
                        <a class="collapse-item" href="buttons.html">Laporan Pembelian</a>
                        <a class="collapse-item" href="buttons.html">Laporan Penjualan</a>
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
                <a class="nav-link" href="tables.html">
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
                        <h1 class="h3 mb-0 text-gray-800">Pembelian</h1>
                    </div>

                    <!-- Content -->
                    <div class="card mb-3 shadow">
                        <div class="card-header bg-primary text-white fw-bold">
                            <i class="bi bi-receipt-cutoff"></i>
                            Transaksi Pembelian
                        </div>

                        <?php
                            function generateKodeTrans() {
                                $prefix = 'KD-TRS-B';
                                $random_number = mt_rand(0, 99999999999);
                                $random_number_padded = str_pad($random_number, 11, '0', STR_PAD_LEFT);
                                $product_code = $prefix . $random_number_padded;
                                return $product_code;
                            }

                            include '../../config/koneksi.php';

                            $data_obat = mysqli_query($conn, "SELECT p.*, s.nama_satuan FROM produk AS p INNER JOIN satuan AS s ON p.satuan_id = s.id");
                            $data_supplier = mysqli_query($conn, "SELECT * FROM supplier");
                            
                        ?>

                        <div class="card-body">
                            <form action="add-pembelian.php" method="POST">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label for="kd_transaksi" class="form-label">Kode Transaksi</label>
                                        <input type="text" class="form-control" id="kd_transaksi" name="kd_transaksi"
                                            value="<?= generateKodeTrans() ?>" readonly required>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="tgl" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tgl" name="tgl" required>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="user" class="form-label">Data User</label>
                                        <input type="text" id="user_id" name="user_id"
                                            value="<?php echo $_SESSION['id']; ?>">
                                        <input type="text" class="form-control" id="user" name="user"
                                            value="<?php echo $_SESSION['name']; ?>" readonly required>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="supplier_id" class="form-label">Supplier</label>
                                        <select class="form-control supplier" id="supplier_id" name="supplier_id"
                                            aria-label="Default select example" required>
                                            <option selected>-- Pilih Supplier --</option>
                                            <?php
                                                    while ($sup = mysqli_fetch_array($data_supplier)) {
                                                ?>
                                            <option value="<?php echo $sup['id']; ?>">
                                                <?php echo $sup['kode_sup']; ?> -
                                                <?php echo $sup['nama_sup']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input class="form-control" type="text" name="keterangan" id="keterangan"
                                                placeholder="Masukkan Keterangan">
                                        </div>
                                    </div>
                                    <div class="col-auto mb-4">
                                        <button type="button" class="btn btn-xs btn-primary btn-sm"
                                            id="tambahRow">Tambah </button>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <table class="table table-bordered" id="dataBeli" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Kode Obat</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah Masuk</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success btn-sm">Simpan
                            </button>
                        </div>
                        </form>
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

    <!-- Select2 -->
    <script src="../../js/select2.min.js"></script>

    <!-- Script untuk fungsi crud -->
    <script>
        $(document).ready(function () {

            $('.supplier').select2({
                theme: 'bootstrap4',
            });

            // Fungsi untuk menambahkan Select2 ke elemen select baru
            function applySelect2() {
                $(".obat-select").select2({
                    theme: 'bootstrap4',
                });
            }

            function deleteRow(button) {
                button.closest("tr").remove();
            }

            $("#tambahRow").click(function () {
                var tableBody = $("#dataBeli tbody");
                var newRow = $("<tr>");

                // Mengirim permintaan AJAX untuk mendapatkan opsi select
                $.ajax({
                    url: 'get-data.php',
                    method: 'GET',
                    success: function (data) {
                        data = JSON.parse(data); // Mengubah data JSON menjadi array
                        console.log(data);
                        newRow.html(`
                        <td>
                            <select class="form-control obat-select w-auto" name="obat_id[]" aria-label="Default select example" required>
                                <option selected disabled>Pilih Obat</option>
                                ${data.map(item => `<option value="${item.id}" data-satuan="${item.satuan_id}" data-nama="${item.nama_satuan}" data-harga="${item.harga}">${item.kode_obat} - ${item.nama_obat}</option>`).join('')}
                            </select>
                        </td>
                        <td>
                            <input type="hidden" class="form-control satuan-id" name="satuan_id[]">
                            <input type="text" class="form-control nama-satuan" disabled>
                        </td>
                        <td>
                            <input type="hidden" class="form-control harga" name="harga[]" readonly>
                            <input type="number" class="form-control harga" name="harga[]" disabled>
                        </td>
                        <td>
                            <input type="number" class="form-control qty" min="1" name="qty[]" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger btn-sm delete-row"><i class="fas fa-trash"></i></button>
                        </td>
                    `);
                        tableBody.append(newRow);

                        // Terapkan Select2 ke elemen select baru
                        applySelect2();

                        // Tambahkan event listener ke tombol silang di setiap baris untuk menghapus baris tersebut saat diklik
                        $(".delete-row").click(function () {
                            deleteRow($(this));
                        });

                        // Tambahkan event listener untuk mengisi input satuan dan harga saat opsi obat dipilih
                        $(".obat-select").change(function () {
                            var satuanInput = $(this).closest("tr").find(
                                ".satuan-id");
                            var namaSatuanInput = $(this).closest("tr").find(
                                ".nama-satuan");
                            var hargaInput = $(this).closest("tr").find(".harga");

                            // Ambil opsi yang dipilih
                            var selectedOption = $(this).find("option:selected");
                            var satuan = selectedOption.data("satuan");
                            var namaSatuan = selectedOption.data("nama");
                            var harga = selectedOption.data("harga");
                            var hargaSet = selectedOption.data("setHarga");
                            satuanInput.val(satuan);
                            namaSatuanInput.val(namaSatuan);
                            hargaInput.val(harga);
                        });
                    },
                    error: function () {
                        alert("Terjadi kesalahan saat memuat data obat.");
                    }
                });
            });
        });
    </script>

</body>

</html>