<?php

$kon = mysqli_connect("localhost","root","","sistem_informasi_karyawan");
if (!$kon){
        die("Koneksi Gagal:".mysqli_connect_error());
}
?>