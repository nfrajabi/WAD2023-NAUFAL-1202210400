<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Donasi Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        include "koneksi.php";

        function input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = input($_POST["nama"]);
            $kode_barang = input($_POST["kode_barang"]);
            $deskripsi = input($_POST["deskripsi"]);
            $kondisi = input($_POST["kondisi"]);
            $jumlah = input($_POST["jumlah"]);

            if (!is_numeric($jumlah) || $jumlah < 0) {
                echo "<div class='alert alert-danger'>Jumlah harus berupa angka positif.</div>";
            } else {
                $allowed_extensions = array("jpg", "jpeg", "png", "gif");
                    $sql = "INSERT INTO barang (nama, kode_barang, deskripsi, kondisi, jumlah) VALUES ('$nama', '$kode_barang', '$deskripsi', '$kondisi', '$jumlah')";
                    $hasil = mysqli_query($conn, $sql);
                    if ($hasil) {
                        echo "<script>alert('Data berhasil ditambahkan. Terima kasih atas donasinya!');</script>";
                        echo "<script>window.location='index.php';</script>";
                    } else {
                        echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
                    }
            }
        }
        ?>
        <h2>Donasikan Barang</h2>

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Barang:</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Barang" required />
            </div>
            <div class="form-group">
                <label>Kode Barang:</label>
                <input type="text" name="kode_barang" class="form-control" placeholder="Masukkan Kode Barang" required />
            </div>
            <div class="form-group">
                <label>Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukkan Deskripsi Barang" required></textarea>
            </div>
            <div class="form-group">
                <label>Kondisi:</label>
                <select name="kondisi" class="form-control">
                    <option value="baru">Baru</option>
                    <option value="bekas">Bekas</option>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah:</label>
                <input type="text" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Barang" required />
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Donasikan Barang</button>
        </form>
    </div>
</body>
</html>
