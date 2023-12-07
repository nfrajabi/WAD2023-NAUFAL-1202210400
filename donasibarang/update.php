<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $nama = $_POST['nama'];
    $kode_barang = $_POST['kode_barang'];
    $deskripsi = $_POST['deskripsi'];
    $kondisi = $_POST['kondisi'];
    $jumlah = $_POST['jumlah'];

    if (!is_numeric($jumlah) || $jumlah < 0) {
        echo "<script>alert('Jumlah harus berupa angka positif.');</script>";
        echo "<script>window.location='update.php?id=$id';</script>";
        exit();
    }

    $sql = "UPDATE barang SET nama='$nama', kode_barang='$kode_barang', deskripsi='$deskripsi', kondisi='$kondisi', jumlah='$jumlah' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diperbarui. Terima kasih atas kontribusimu!');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "<script>alert('Maaf, terjadi kesalahan saat memperbarui data. Silakan coba lagi.');</script>";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Donasi Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $id = $_GET['id'];
    $query = "SELECT * FROM barang WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <h2>Perbarui Data Barang untuk Donasi</h2>
        <form method="post" action="update.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama Barang:</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required />
            </div>
            <div class="form-group">
                <label for="kode_barang">Kode Barang:</label>
                <input type="text" name="kode_barang" class="form-control" value="<?php echo $data['kode_barang']; ?>" required />
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" rows="4" required><?php echo $data['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="kondisi">Kondisi:</label>
                <select name="kondisi" class="form-control">
                    <option value="baru" <?php if ($data['kondisi'] == 'baru') echo 'selected'; ?>>Baru</option>
                    <option value="bekas" <?php if ($data['kondisi'] == 'bekas') echo 'selected'; ?>>Bekas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" required />
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <button type="submit" name="submit" class="btn btn-primary">Perbarui Data</button>
        </form>
    </div>
</body>
</html>
