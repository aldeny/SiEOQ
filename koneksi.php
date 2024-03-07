<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_sistem_ta"
);

//cek koneksi
if (mysqli_connect_errno()) {
    echo "koneksi database gagal :" . mysqli_connect_error();
}
?>




