<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var nama_varian = document.getElementById("nama_varian").value;
            var harga = document.getElementById("harga").value;
            var stok = document.getElementById("stok").value;

            if (nama_varian.trim() === '' || harga.trim() === '' || stok.trim() === '') {
                alert("Harap isi semua kolom!");
                return false;
            } else {
                alert("Data Berhasil Diedit");
                return true;
            }
        }
    </script>
    <style>
        body {
            padding: 20px;
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-success" style="margin-bottom:5px; margin-top:20px;" href="admin.php"> Kembali
                </a><br><br>
                <?php
                include 'koneksi.php';
                date_default_timezone_set('Asia/Jakarta');

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = mysqli_query($conn, "SELECT * FROM varian WHERE id = $id");

                    if (mysqli_num_rows($query) > 0) {
                        $varian = mysqli_fetch_assoc($query);
                    } else {
                        echo "Produk tidak ditemukan.";
                        exit;
                    }
                } else {
                    echo "ID Produk tidak ditemukan.";
                    exit;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $nama_varian = $_POST['nama_varian'];
                    $harga = $_POST['harga'];
                    $stok = $_POST['stok'];

                    $update_query = "UPDATE varian SET nama_varian='$nama_varian', harga='$harga', stok='$stok' WHERE id = $id";
                    $update_result = mysqli_query($conn, $update_query);

                    header("Location:admin.php");
                }
                ?>

                <h1>Edit Produk</h1>
                <form method="post" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="nama_varian">Varian:</label>
                        <input type="text" class="form-control" id="nama_varian" name="nama_varian"
                            value="<?php echo $varian['nama_varian']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="text" class="form-control" id="harga" name="harga"
                            value="<?php echo $varian['harga']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok:</label>
                        <input type="text" class="form-control" id="stok" name="stok"
                            value="<?php echo $varian['stok']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>