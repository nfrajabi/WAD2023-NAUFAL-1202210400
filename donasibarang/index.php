<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET["id"]);

    $sql = "DELETE FROM barang WHERE id='$id'";
    $hasil = mysqli_query($conn, $sql);

    if ($hasil) {
        echo "<script>alert('Data berhasil dihapus.');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.');</script>";
        echo "<script>window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manajemen Donasi Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Selamat Datang di Manajemen Donasi Barang</span>
    </nav>
    <div class="container my-3">
        <h4 class="my-3">Manajemen Donasi Barang</h4>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Deskripsi</th>
                    <th>Kondisi</th>
                    <th>Jumlah</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM barang ORDER BY id DESC";
            $hasil = mysqli_query($conn, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["kode_barang"]; ?></td>
                    <td><?php echo $data["deskripsi"]; ?></td>
                    <td><?php echo $data["kondisi"]; ?></td>
                    <td><?php echo $data["jumlah"]; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=<?php echo $data['id']; ?>" class="btn btn-danger" role="button" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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
