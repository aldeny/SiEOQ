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

    <title>EOQ - Obat / Produk</title>

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
            <li class="nav-item active">
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
                        <h1 class="h4 mb-0 text-gray-800 font-weight-bold text-uppercase">Obat / Produk</h1>
                    </div>

                    <!-- Content -->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Obat / Produk</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary btn-icon-split" id="btnAdd">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </button>
                            <a href="../reports/export-obat-pdf.php" class="btn btn-secondary btn-icon-split"
                                target="_blank">
                                <span class="icon text-white-50">
                                    <i class="fas fa-file-pdf"></i>
                                </span>
                                <span class="text">Export PDF</span>
                            </a>
                            <a href="../reports/export-obat-excel.php" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-file-excel"></i>
                                </span>
                                <span class="text">Export Excel</span>
                            </a>

                            <div class="mt-3">
                                <table class="table table-bordered" id="tblObat" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Biaya Simpan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Biaya Simpan</th>
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

    <!-- Modal -->
    <div class="modal fade" id="modalObat" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="modalObatLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalObatLabel"></h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formObat">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="id" id="id" hidden>
                                    <input type="text" name="action" id="action" hidden>
                                    <label for="kode_obat">Kode Obat</label>
                                    <input class="form-control" id="kode_obat" name="kode_obat" type="text"
                                        placeholder="Kode Obat" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat</label>
                                    <input class="form-control" id="nama_obat" name="nama_obat" type="text"
                                        placeholder="Nama Obat" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="form-control" id="supplier" name="supplier">
                                        <option selected disabled value="0">-- Pilih Supplier --</option>
                                        <?php
                                        include '../../config/koneksi.php';
                                        $sql = "SELECT * FROM supplier";
                                        $query = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            echo "<option value='" . $data['id'] . "'>".$data['kode_sup']. " - " . $data['nama_sup'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="kategori">Kategori Obat</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        <option selected disabled value="0">-- Pilih Kategori --</option>
                                        <?php
                                        include '../../config/koneksi.php';
                                        $sql = "SELECT * FROM kategori";
                                        $query = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            echo "<option value='" . $data['id'] . "'>" . $data['nama_kategori'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <select class="form-control" id="satuan" name="satuan">
                                        <option selected disabled value="0">-- Pilih satuan --</option>
                                        <?php
                                        include '../../config/koneksi.php';
                                        $sql = "SELECT * FROM satuan";
                                        $query = mysqli_query($conn, $sql);
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            echo "<option value='" . $data['id'] . "'>" . $data['nama_satuan'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <label for="stock">Stock</label>
                                    <input class="form-control" id="stock" name="stock" type="text"
                                        placeholder="nameexample" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="harga">Harga Obat</label>
                                    <input class="form-control" id="harga" name="harga" type="text"
                                        placeholder="Rp.000.00" onkeyup="formatRupiah(this)" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="biaya_penyimpanan">Biaya Penyimpanan</label>
                                    <input class="form-control" id="biaya_penyimpanan" name="biaya_penyimpanan"
                                        type="text" placeholder="Rp.000.00" onkeyup="formatRupiah(this)" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" placeholder="Leave a comment here" id="keterangan"
                                        name="keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary btn-sm" id="btnAction">Tambah
                            </button>
                            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->

    <div class="modal fade" id="detailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title fw-bold text-white" id="detailModalLabel">Detail Produk/Obat</h5>
                    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Konten modal -->
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody id="detailTableBody">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
            tblObat();

            $('#modalObat').on('hidden.bs.modal', function (e) {
                formReset();
            });
        });

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });

        $('#formObat').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            console.log(formData.get('action'));

            if (formData.get('action') == 'add') {
                $.ajax({
                    method: 'POST',
                    url: 'add-obat.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {

                        if (data.status == 'success') {
                            $('#modalObat').modal('hide');

                            //toast
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });

                            $('#tblObat').DataTable().ajax.reload();
                            formReset();
                        } else {

                            Toast.fire({
                                icon: 'error',
                                text: 'Periksa kembali data yang anda masukkan!'
                            });
                        }

                    },
                    //tampilan pesan jika error
                    error: function (data) {
                        Toast.fire({
                            icon: 'error',
                            text: 'Terjadi kesalahan!'
                        });
                    }
                });
            } else if (formData.get('action') == 'update') {

                $.ajax({
                    method: 'POST',
                    url: 'update-obat.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#modalObat').modal('hide');

                        //toast
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });

                        $('#tblObat').DataTable().ajax.reload();
                        formReset();
                    },
                    error: function (data) {
                        Toast.fire({
                            icon: 'error',
                            text: data.message
                        });
                    }
                });
            }
        });

        $(document).on('click', '#btnAdd', function () {

            $('#modalObatLabel').text('Tambah Supplier');
            $('#modalObat').modal('show');
            $('#btnAction').text('Simpan');

            $('#kode_obat').val(generateKodeObat());
            $('#action').val('add');

            // $.ajax({
            //     url: "get-datas.php",
            //     method: "GET",
            //     dataType: "json",
            //     success: function (data) {

            //         var selectSupplier = $('#supplier');
            //         var selectSatuan = $('#satuan');

            //         // Isi data supplier
            //         selectSupplier.empty();
            //         selectSupplier.append(
            //             '<option selected disabled>-- Pilih Supplier --</option>');
            //         data.supplier.forEach(function (item) {
            //             selectSupplier.append('<option value="' + item.id + '">' + item
            //                 .kode_sup + ' - ' + item
            //                 .nama_sup + '</option>');
            //         });

            //         // Isi data satuan
            //         selectSatuan.empty();
            //         selectSatuan.append(
            //             '<option selected disabled>-- Pilih Satuan --</option>');
            //         data.satuan.forEach(function (item) {
            //             selectSatuan.append('<option value="' + item.id + '">' + item
            //                 .nama_satuan + '</option>');
            //         });

            //         // Isi data kategori
            //         var selectKategori = $('#kategori');
            //         selectKategori.empty();
            //         selectKategori.append(
            //             '<option selected disabled>-- Pilih Kategori --</option>');
            //         data.kat.forEach(function (item) {
            //             selectKategori.append('<option value="' + item.id + '">' + item
            //                 .nama_kategori + '</option>');
            //         });
            //     },
            //     error: function (error) {
            //         console.error('Error:', error);
            //     }
            // })

        });

        $(document).on('click', '#btn-edit', function () {

            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: "get-obat.php?id=" + id,
                data: {
                    id: id
                },
                dataType: "json",
                success: function (data) {

                    $('#modalObatLabel').text('Edit Obat');
                    $('#modalObat').modal('show');
                    $('#btnAction').text('Update');

                    $('#id').val(data.id);
                    $('#kode_obat').val(data.kode_obat);
                    $('#nama_obat').val(data.nama_obat);
                    $('#kategori').val(data.kategori_id);
                    $('#satuan').val(data.satuan_id);
                    $('#stock').val(data.stock);
                    $('#harga').val(data.harga);
                    $('#biaya_penyimpanan').val(data.biaya_penyimpanan);
                    $('#supplier').val(data.sup_id);
                    $('#keterangan').val(data.keterangan);
                    $('#action').val('update');
                },
                error: function (data) {

                    Toast.fire({
                        icon: 'error',
                        text: data.message
                    });
                }
            });
        });

        $(document).on('click', '#btn-detail', function () {
            var id = $(this).data('id');

            $.ajax({
                url: 'detail-obat.php',
                type: 'GET',
                data: {
                    id: id
                },
                dataType: 'json', // Tentukan tipe data yang diharapkan
                success: function (response) {

                    console.log(response);

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
        })

        $(document).on('click', '#btn-hapus', function () {

            var id = $(this).data('id');

            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus data ini?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "delete-obat.php",
                        data: {
                            id: id
                        },
                        success: function (data) {

                            //toast
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });

                            $('#tblObat').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            })
        })

        function formReset() {
            $('#id').val('');
            $('#kode_obat').val('');
            $('#nama_obat').val('');
            $('#supplier').val('0');
            $('#kategori').val('0');
            $('#satuan').val('0');
            $('#stock').val('');
            $('#harga').val('');
            $('#biaya_penyimpanan').val('');
            $('#keterangan').val('');
            $('#action').val('add');
        }

        function generateKodeObat() {
            const prefix = 'KD-OB';
            const random_number = Math.floor(Math.random() *
                1000000); // generate random number between 0 and 999999
            const random_number_padded = random_number.toString().padStart(6,
                '0'); // pad the number with leading zeros
            const obat_code = prefix + random_number_padded;
            return obat_code;
        }

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

        function tblObat() {
            $("#tblObat").DataTable({
                lengthChange: true,
                processing: false,
                ajax: {
                    url: "obat-datatables.php",
                },
                columns: [{
                        data: null,
                        sortable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: "kode_obat",
                        name: "kode_obat",
                    },
                    {
                        data: "nama_obat",
                        name: "nama_obat",
                    },
                    {
                        data: "harga",
                        name: "harga",
                    },
                    {
                        data: "stok",
                        name: "stok",
                    },
                    {
                        data: "satuan",
                        name: "satuan",
                    },
                    {
                        data: "biaya_simpan",
                        name: "biaya_simpan",
                    },
                    {
                        data: "aksi",
                        name: "aksi",
                    }
                ],
            });
        }
    </script>

</body>

</html>