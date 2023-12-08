<!DOCTYPE html>
<html>
<head>
    <title>Halaman Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <br>
    <h4><center>Form Pendaftaran</center></h4>
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

        $nama=input($_POST["nama"]);
        $usia=input($_POST["usia"]);
        $sekolah=input($_POST["sekolah"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);

        //Query input menginput data kedalam tabel mahasiswa
        $sql="insert into mahasiswa (nama, usia, sekolah, no_hp, alamat) values
		('$nama','$usia','$sekolah','$no_hp','$alamat')";

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
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>Usia:</label>
            <input type="number" name="usia" class="form-control" placeholder="Masukan Usia" min="1" max="100" required/>
        </div>
       <div class="form-group">
            <label>Asal Sekolah :</label>
            <input type="text" name="sekolah" class="form-control" placeholder="Masukan Asal Sekolah" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Nomor HP:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan Nomor HP" required/>
        </div> 
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" rows="5"placeholder="Masukan Alamat" required></textarea>
        </div>   

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>