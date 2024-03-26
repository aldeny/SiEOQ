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
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

</head>

<body class=" sb-nav-fixed">
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
                        <a class="nav-link " href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                            Transaksi Pembelian
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-box-archive"></i></div>
                            Data Pembelian
                        </a>
                        <a class="nav-link active" href="../penjualan/index.php">
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
                        if (isset($_SESSION['error'])) {
                            echo '
                            <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
                                <strong>' . $_SESSION['success'] . '</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            // Hapus pesan notifikasi agar tidak ditampilkan kembali
                            unset($_SESSION['error']);
                        }

                        function generateKodeTrans() {
                            $prefix = 'KD-TRS-J';
                            $random_number = mt_rand(0, 99999999999);
                            $random_number_padded = str_pad($random_number, 11, '0', STR_PAD_LEFT);
                            $product_code = $prefix . $random_number_padded;
                            return $product_code;
                        }

                        include '../koneksi.php';

                        $data_obat = mysqli_query($koneksi, "SELECT p.*, s.nama_satuan FROM produk AS p INNER JOIN satuan AS s ON p.satuan_id = s.id");
                        $data_supplier = mysqli_query($koneksi, "SELECT * FROM supplier");
                        
                    ?>
                    <div class="row">
                        <div class="section_content section_content--p30">
                            <div class="card mb-3 shadow">
                                <div class="card-header bg-primary text-white fw-bold">
                                    <i class="bi bi-receipt-cutoff"></i>
                                    Transaksi Penjualan
                                </div>
                                <div class="card-body">
                                    <form action="../function/penjualan/save.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <label for="kd_transaksi" class="form-label">Kode Transaksi</label>
                                                <input type="text" class="form-control" id="kd_transaksi"
                                                    name="kd_transaksi" value="<?= generateKodeTrans() ?>" readonly
                                                    required>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="tgl" class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" id="tgl" name="tgl" required>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="user" class="form-label">Data User</label>
                                                <input type="text" id="user_id" name="user_id"
                                                    value="<?php echo $_SESSION['id']; ?>" hidden>
                                                <input type="text" class="form-control" id="user" name="user"
                                                    value="<?php echo $_SESSION['name']; ?>" readonly required>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label for="supplier_id" class="form-label">Supplier</label>
                                                <select class="form-select supplier" id="supplier_id" name="supplier_id"
                                                    aria-label="Default select example" required>
                                                    <option selected>Pilih Supplier</option>
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
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input class="form-control" type="text" name="keterangan"
                                                    id="keterangan" placeholder="Masukkan Keterangan">
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
                                                            <th>Stock</th>
                                                            <th>Stock Out</th>
                                                            <th>Total Harga</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-xs btn-success btn-sm">Simpan <i
                                                        class="bi bi-save"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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

    <!-- Modal peringatan -->
    <div class="modal fade" id="peringatan" tabindex="-1" aria-labelledby="peringatanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="peringatanLabel">Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="peringatan-text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.satuan').select2({
                theme: 'bootstrap-5'
            });
            $('.supplier').select2({
                theme: 'bootstrap-5'
            });
            // Fungsi untuk menambahkan Select2 ke elemen select baru
            function applySelect2() {
                $(".obat-select").select2({
                    theme: "bootstrap-5"
                });
            }

            // Fungsi untuk menghapus baris
            function deleteRow(button) {
                button.closest("tr").remove();
            }

            $("#tambahRow").click(function () {
                var tableBody = $("#dataBeli tbody");
                var newRow = $("<tr>");

                // Mengirim permintaan AJAX untuk mendapatkan opsi select
                $.ajax({
                    url: '../function/pembelian/getData.php',
                    method: 'GET',
                    success: function (data) {
                        data = JSON.parse(data); // Mengubah data JSON menjadi array
                        console.log(data);
                        newRow.html(`
                        <td>
                            <select class="form-select obat-select w-auto" name="obat_id[]" aria-label="Default select example" required>
                                <option selected disabled>Pilih Obat</option>
                                ${data.map(item => `<option value="${item.id}" data-satuan="${item.satuan_id}" data-nama="${item.nama_satuan}" data-stock="${item.stock}" data-harga="${item.harga}">${item.kode_obat} - ${item.nama_obat}</option>`).join('')}
                            </select>
                        </td>
                        <td>
                            <input type="hidden" class="form-control satuan-id" name="satuan_id[]">
                            <input type="text" class="form-control nama-satuan" disabled>
                        </td>
                        <td>
                            <input type="hidden" class="form-control harga" name="harga[]" readonly>
                            <input type="text" class="form-control harga" name="harga[]" disabled>
                        </td>
                        <td>
                            <input type="hidden" class="form-control stock" name="stock[]" readonly>
                            <input type="number" class="form-control stock" name="stock[]" disabled>
                        </td>
                        <td>
                            <input type="number" class="form-control qty" min="1" name="qty[]" required>
                        </td>
                        <td>
                            <input type="hidden" class="form-control subtotal" name="subtotal[]">
                            <input type="text" class="form-control subtotal" name="subtotal[]" disabled>
                        </td>
                        <td>
                            <button type="button" class="btn btn-xs btn-danger btn-sm delete-row"><i class="bi bi-x-circle-fill"></i></button>
                        </td>
                    `);
                        tableBody.append(newRow);

                        // Terapkan Select2 ke elemen select baru
                        applySelect2();

                        // Tambahkan event listener ke tombol silang di setiap baris untuk menghapus baris tersebut saat diklik
                        $(".delete-row").click(function () {
                            deleteRow($(this));
                        });

                        // Deklarasikan variabel subtotalInput di luar event listener
                        var subtotalInput;

                        // Tambahkan event listener untuk mengisi input satuan dan harga saat opsi obat dipilih
                        $(".obat-select").change(function () {
                            var satuanInput = $(this).closest("tr").find(
                                ".satuan-id");
                            var namaSatuanInput = $(this).closest("tr").find(
                                ".nama-satuan");
                            var hargaInput = $(this).closest("tr").find(".harga");
                            var stock = $(this).closest("tr").find(".stock");
                            subtotalInput = $(this).closest("tr").find(
                                ".subtotal"); // Simpan nilai subtotalInput

                            // Ambil opsi yang dipilih
                            var selectedOption = $(this).find("option:selected");
                            var satuan = selectedOption.data("satuan");
                            var namaSatuan = selectedOption.data("nama");
                            var harga = selectedOption.data("harga");
                            var stockAwal = selectedOption.data("stock");

                            satuanInput.val(satuan);
                            namaSatuanInput.val(namaSatuan);
                            hargaInput.val(formatRupiah(harga));
                            console.log("Harga: " + formatRupiah(harga));
                            stock.val(stockAwal);
                        });

                        // Tambahkan event listener untuk memvalidasi jumlah (qty) saat nilainya berubah
                        $(".qty").change(function () {
                            var qtyInput = $(this);
                            var stockInput = qtyInput.closest("tr").find(".stock");
                            var subtotalInput = qtyInput.closest("tr").find(
                                ".subtotal");
                            var stock = parseInt(stockInput.val());
                            var enteredQty = parseInt(qtyInput.val());

                            if (enteredQty > stock) {
                                // Tampilkan pesan peringatan
                                $('#peringatan').modal('show');
                                $('#peringatan .modal-body').text(
                                    'Jumlah keluar melebihi stok yang tersedia.'
                                );
                                // reset input qty
                                qtyInput.val(1);

                            } else if (enteredQty <= 0) {
                                // Tampilkan pesan peringatan
                                $('#peringatan').modal('show');
                                $('#peringatan .modal-body').text(
                                    'Jumlah keluar harus lebih dari 0');
                                // Atur kembali nilai qtyInput menjadi 1
                                qtyInput.val(1);
                            }

                            // Hitung subtotal dan tampilkan
                            var harga = parseInt(qtyInput.closest("tr").find(
                                ".harga").val().replace(/\./g, ''));
                            subtotalInput.val(formatRupiah(enteredQty * harga));
                        });


                        // Fungsi untuk mengubah nilai menjadi format rupiah
                        function formatRupiah(angka) {
                            return angka.toLocaleString('id-ID');
                        }
                    },
                    error: function () {
                        alert("Terjadi kesalahan saat memuat data obat.");
                    }
                });
            });
        });
    </script>

    <script>
        // function updateTotal() {
        //     var total = document.getElementById('harga').value;
        //     total = total.replace(/[^\d]/g, '');
        //     total = parseInt(total);
        //     console.log(total);
        //     var stock_out = document.getElementById('stock_out').value;
        //     stock_out = stock_out.replace(/[^\d]/g, '');
        //     stock_out = parseInt(stock_out);
        //     console.log(stock_out);

        //     $total_harga = total * stock_out;
        //     console.log($total_harga);

        //     document.getElementById('total').value = rupiahTotal($total_harga);
        // }

        // function rupiahTotal(angka) {
        //     var reverse = angka.toString().split('').reverse().join('');
        //     var ribuan = reverse.match(/\d{1,3}/g);
        //     var formatted = ribuan.join('.').split('').reverse().join('');
        //     return formatted;
        // }
    </script>
</body>

</html>