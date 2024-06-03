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
                        <h1 class="h3 mb-0 text-gray-800">Pembelian</h1>
                    </div>

                    <?php
                        if (isset($_SESSION['success'])) {
                            echo '
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>' . $_SESSION['success'] . '</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                                ';
                            // Hapus pesan notifikasi agar tidak ditampilkan kembali
                            unset($_SESSION['success']);
                        }
                    ?>

                    <!-- Content -->
                    <div class="card shadow">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Pembelian</h6>
                            <a href="create-pembelian.php" class="btn btn-primary btn-sm btn-icon-split" id="btnAdd">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="mt-3">
                                <table class="table table-bordered" id="tblPembelian" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>KD Transaksi</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>PIC</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>KD Transaksi</th>
                                            <th>Tanggal Pembelian</th>
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
            tblPembelian();

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

        $('#formSatuan').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            if (formData.get('action') == 'add') {
                $.ajax({
                    method: 'POST',
                    url: 'add-satuan.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {

                        if (data.success == true) {
                            //toast
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                        } else {
                            //toast
                            Toast.fire({
                                icon: 'error',
                                title: data.message
                            });
                        }

                        $('#tblPembelian').DataTable().ajax.reload();
                        formReset();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                        // Menampilkan notifikasi error jika terdapat pesan
                        let errorMessage = 'Terjadi kesalahan.';
                        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                            errorMessage = jqXHR.responseJSON.message;
                        }

                        Toast.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage
                        });
                    }
                });
            } else if (formData.get('action') == 'update') {

                $.ajax({
                    method: 'POST',
                    url: 'update-satuan.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                        $('#btnSimpan').text('Simpan');

                        //toast
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });

                        $('#tblPembelian').DataTable().ajax.reload();
                        formReset();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                        // Menampilkan notifikasi error jika terdapat pesan
                        let errorMessage = 'Terjadi kesalahan.';
                        if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                            errorMessage = jqXHR.responseJSON.message;
                        }

                        Toast.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage
                        });
                    }
                });
            }
        });

        $(document).on('click', '#btnAdd', function () {

            $('#modalSuppLabel').text('Tambah Supplier');
            $('#modalSupp').modal('show');
            $('#btnAction').text('Simpan');

            $('#kd_supplier').val(generateKodeSupplier());
            $('#action').val('add');
        });

        $(document).on('click', '#btn-edit', function () {

            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: "get-satuan.php",
                data: {
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    $('#btnSimpan').text('Update');

                    $('#id').val(data.id);
                    $('#nm_satuan').val(data.nama_satuan);
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
            var kode = $(this).data('kode');

            $.ajax({
                url: 'detail-pembelian.php',
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
                    $('#kodeTransaksi').html(data[0].kode_transaksi);
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
                        tableRows += '<td>' + rowData.stock_in + ' ' + rowData
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
                        url: "delete-satuan.php",
                        data: {
                            id: id
                        },
                        success: function (data) {

                            //toast
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });

                            $('#tblPembelian').DataTable().ajax.reload();
                        }
                    });
                } else {
                    return false;
                }
            })
        })

        function formReset() {
            $('#id').val('');
            $('#nm_satuan').val('');
            $('#keterangan').val('');
            $('#action').val('add');
        }

        function generateKodeSupplier() {
            const prefix = 'KD-SUP';
            const random_number = Math.floor(Math.random() * 1000000); // generate random number between 0 and 999999
            const random_number_padded = random_number.toString().padStart(6, '0'); // pad the number with leading zeros
            const supplier_code = prefix + random_number_padded;
            return supplier_code;
        }

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

        function tblPembelian() {
            $("#tblPembelian").DataTable({
                lengthChange: true,
                processing: false,
                ajax: {
                    url: "pembelian-datatables.php",
                },
                columns: [{
                        data: null,
                        sortable: false,
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: "kode_transaksi",
                        name: "kode_transaksi",
                    },
                    {
                        data: "tanggal",
                        name: "tanggal",
                    },
                    {
                        data: "nama",
                        name: "nama",
                    },
                    {
                        data: "keterangan",
                        name: "keterangan",
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