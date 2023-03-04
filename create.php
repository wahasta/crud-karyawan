<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_depan=input($_POST["nama_depan"]);
        $nama_belakang=input($_POST["nama_belakang"]);
        $alamat=input($_POST["alamat"]);
        $tanggal_lahir=input($_POST["tangga_lahir"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
    

        //Query input menginput data kedalam tabel anggota
        $sql="insert into karyawan (nama_depan,nama_belakang,alamat,jenis_kelamin,tanggal_lahir) values
		('$nama_depan','$nama_belakang','$alamat','$jenis_kelamin','$tanggal_lahir')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
        <h2>Input Data</h2>


        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="form-group">
                <label>nama depan:</label>
                <input type="text" name="nama_depan" class="form-control" placeholder="Masukan Nama" required />
            </div><div class="form-group">
                <label>nama belakang:</label>
                <input type="text" name="nama_belakang" class="form-control" placeholder="Masukan Nama" required />
            </div>
            <div class="form-group">
                <label>jenis_kelamin:</label>
                <input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukan jenis kelami" required />
            </div>
            <div class="form-group">
                <label>tanggal_lahir :</label>
                <input type="text" name="tanggal_lahir" class="form-control" placeholder="Masukan tanggal lahir" required />
            </div>
            <div class="form-group">
                <label>Alamat:</label>
                <textarea name="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>