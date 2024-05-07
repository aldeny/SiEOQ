<?php

    include '../../koneksi.php';

    if (isset($_GET['dari']) && isset($_GET['sampai'])) {
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];

        $query = mysqli_query($koneksi, 
            "SELECT 
                tp.id,
                p.biaya_penyimpanan,
                p.nama_obat, 
                tp.harga,
                s.nama_satuan,
                SUM(tp.stock_out) as stock_out,
                SUM(tp.stock_out * tp.harga) as pendapatan
            FROM transaksi_penjualan AS tp 
            INNER JOIN produk AS p ON tp.produk_id = p.id
            INNER JOIN user AS u ON tp.user_id = u.id
            INNER JOIN satuan AS s ON tp.satuan_id = s.id
            INNER JOIN supplier AS sup ON tp.sup_id = sup.id
            WHERE tp.tanggal BETWEEN '$dari' AND '$sampai'
            GROUP BY p.nama_obat
            ORDER BY pendapatan DESC");

            $data_pendapatan = array();

            while ($data = mysqli_fetch_assoc($query)) {
                $datas[] = $data;
                $data_pendapatan[] = $data["pendapatan"];
            }

            // Menghitung pendapatan dalam rentang waktu yang di pilih
            $total_pendapatan = array_sum($data_pendapatan);

            // var_dump(count($data_pendapatan));

            //menghitung persentase pendapatan per item
            $persen_pendapatan_produk = array();
            for ($i = 0; $i < count($data_pendapatan); $i++) {
                $persen_pendapatan = ($data_pendapatan[$i] / $total_pendapatan) * 100;
                //munculkan angka 2 digit di belakang koma
                $persen_pendapatan = round($persen_pendapatan, 2);
                $persen_pendapatan_produk[] = $persen_pendapatan;
            }

            // var_dump('jumlah data persen pendapatan =' . count($persen_pendapatan_produk));

            // Menghitung kolom komulatif
            $komulatif = array();
            $komulatif[0] = $persen_pendapatan_produk[0];
            // var_dump($komulatif[0]);
            for ($i = 1; $i < count($persen_pendapatan_produk); $i++) {
                $komulatif[$i] = $komulatif[$i - 1] + $persen_pendapatan_produk[$i];

                // Pastikan nilai komulatif tidak melebihi 100
                if ($komulatif[$i] > 100) {
                    $komulatif[$i] = 100;
                }

                //munculkan angka 2 digit di belakang koma
                $komulatif[$i] = round($komulatif[$i], 2);
                // var_dump('komulatif ke-' . $i . ' = ' . $komulatif[$i]);

            }

            // var_dump($komulatif);
            // var_dump('jumlah data komulatif =' . count($komulatif));
            
            // Menentukan grade komulatif
            $grade_komulatif = array();
            for ($i = 0; $i < count($komulatif); $i++) {
                if ($komulatif[$i] >= 0 && $komulatif[$i] <= 70) {
                    $grade_komulatif[] = "A";
                }
                if ($komulatif[$i] >= 71 && $komulatif[$i] <= 90) {
                    $grade_komulatif[] = "B";
                }
                if ($komulatif[$i] > 91 && $komulatif[$i] <= 100) {
                    $grade_komulatif[] = "C";
                }
            }

            // var_dump('jumlah data grade komulatif =' . count($grade_komulatif));

            //hitung total grade komulatif yang sama
            $total_komulatif_sama = array_count_values($grade_komulatif);
            //jumlah data komulatif
            $total_komulatif = count($komulatif);

            // Inisialisasi array untuk menyimpan total pendapatan per kelompok grade
            $total_pendapatan_per_grade = array();
            // Lakukan iterasi pada data dan grade komulatif
            for ($i = 0; $i < count($datas); $i++) {
                $grade = $grade_komulatif[$i];
                $pendapatan = $datas[$i]['pendapatan'];
                
                // Periksa apakah grade sudah ada dalam array total_pendapatan_per_grade
                if (!array_key_exists($grade, $total_pendapatan_per_grade)) {
                    // Jika belum, inisialisasi total pendapatan untuk grade tersebut
                    $total_pendapatan_per_grade[$grade] = 0;
                }
                
                // Tambahkan pendapatan saat ini ke total pendapatan untuk grade tersebut
                $total_pendapatan_per_grade[$grade] += $pendapatan;
            }

            // Menghitung persentase pendapatan per kelompok
            $persen_pendapatan_kelompok = array();
            foreach ($total_pendapatan_per_grade as $grade => $pendapatan) {
                $persen_pendapatan = ($pendapatan / $total_pendapatan) * 100;
                //munculkan angka 2 digit di belakang koma
                $persen_pendapatan = round($persen_pendapatan, 2);
                $persen_pendapatan_kelompok[$grade] = $persen_pendapatan;
            }
            
            //disini kita mulai hitung EOQ
            //menampilkan data dengan grade atau kelompok A saja
            // Inisialisasi array untuk menyimpan data dengan grade A saja
            $data_grade_A = array();

            // Lakukan iterasi pada data
            for ($i = 0; $i < count($datas); $i++) {
                // Periksa apakah grade komulatif pada indeks yang sama dengan data adalah "A"
                if ($grade_komulatif[$i] === "A") {
                    // Jika ya, tambahkan data tersebut ke dalam array $data_grade_A
                    $data_grade_A[] = $datas[$i];
                }
            }

            //hitung eoq
            $data_eoq = array();
            $data_p = array();
            for ($i = 0; $i < count($data_grade_A); $i++) { 
                $data_eoq[] = sqrt( (2*$data_grade_A[$i]['stock_out'] * 50000) / $data_grade_A[$i]['biaya_penyimpanan'] );
                //bulatkan bila yang berkoma
                $data_eoq[$i] = round($data_eoq[$i],2);
                $data_p[] = $data_grade_A[$i]['stock_out']/$data_eoq[$i];
                $data_p[$i] = round($data_p[$i]);

            }

            echo json_encode(
                array(
                    'data' => $datas,
                    'total_pendapatan' => $total_pendapatan,
                    'persen_pendapatan' => $persen_pendapatan_produk,
                    'komulatif' => $komulatif,
                    'grade_komulatif' => $grade_komulatif,
                    'total_komulatif_sama' => $total_komulatif_sama,
                    'total_komulatif' => $total_komulatif,
                    'total_pendapatan_per_grade' => $total_pendapatan_per_grade,
                    'persen_pendapatan_kelompok' => $persen_pendapatan_kelompok,
                    'data_grade_A' => $data_grade_A,
                    'data_eoq' => $data_eoq,
                    'data_p' => $data_p
                    
                )
            );

        } else {
            echo json_encode(array('error' => 'Data tidak ditemukan'));
        }
        
        

?>