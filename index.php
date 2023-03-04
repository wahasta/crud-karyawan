<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    CRUD Tables with PHP and Bootstrap</title>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1"></span>
        </div>CRUD Tables with PHP and Bootstrap
    </nav>
    <div class="container">
        <br>
        <h4>
        CRUD Tables with PHP and Bootstrap
        </h4>
        <?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_karyawan'])) {
        $id_karyawan=htmlspecialchars($_GET["id_karyawan"]);

        $sql="delete from karyawan where id_karyawan='$id_karyawan' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


        <tr class="table-danger">
            <br>
            <thead>
                <tr>
                    <table class="my-3 table table-bordered">
                        <tr class="table-primary">
                            <th>id_karyawan</th>
                            <th>nama_depan</th>
                            <th>nama_belakang </th>   
                            <th>jenis_kelamin</th>
                            <th>tanggal_lahir</th>
                            <th>Alamat</th>
                            <th>aksi </th>
                        </tr>
            </thead>

            <?php
        include "koneksi.php";
        $sql = "SELECT * FROM karyawan";

        $hasil=mysqli_query($kon, $sql);

        $no=0;

        $peserta = [];
        while ($data = mysqli_fetch_assoc($hasil)) {
            $peserta[] = $data;
        }

        foreach ($peserta as $data) {
            $no++;

            ?>
            <tbody>
                <tr>
                    <td><?php echo $data["id_karyawan"];   ?></td>
                    <td><?php echo $data["nama_depan"];   ?></td>
                    <td><?php echo $data["nama_belakang"]; ?></td>
                    <td><?php echo $data["jenis_kelamin"];   ?></td>
                    <td><?php echo $data["tanggal_lahir"];   ?></td>
                    <td><?php echo $data["alamat"];   ?></td>
                    <td>
                        <a href="update.php?id_karyawan=<?php echo htmlspecialchars($data['id_karyawan']); ?>"
                            class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_karyawan=<?php echo $data['id_karyawan']; ?>"
                            class="btn btn-danger" role="button">Delete</a>
                    </td>
                </tr>
            </tbody>
            <?php
        }
        ?>
            </table>
            <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>

</html>