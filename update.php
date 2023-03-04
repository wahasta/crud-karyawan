<!DOCTYPE html>
<html>

<head>
    <title>Form Pendaftaran Anggota</title>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id_peserta'])) {
        $id_peserta=input($_GET["id_peserta"]);

        $sql="select * from peserta where id_peserta=$id_peserta";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //CeDk apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_karyawan=$_GET["id_karyawan"];
        $nama_depan=input($_POST["nama_depan"]);
        $nama_belakang=input($_POST["nama_belakang"]);
        $alamat=input($_POST["alamat"]);
        $jenis_kelamin=input($_POST["jenis_kelamin"]);
        $tanggal_lahir=input($_POST["tanggal_lahir"]);

        //Query update data pada tabel anggota
        $sql="update karyawan set
			nama_depan='$nama_depan',
			nama_belakang='$nama_belakang',
			alamat='$alamat',
			jenis_kelamin='$jenis_kelamin',
			tanggal_lahir='$tanggal_lahir'
			where id_karyawan=$id_karyawan";

        //Mengeksekusi atau menjalankan query diatas
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
        <h2>Update Data</h2>


        <form method="post">
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

            <input type="hidden" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" />

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>