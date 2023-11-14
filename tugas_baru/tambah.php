<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var nama_varian = document.getElementById("nama_varian").value;
            var gambar = document.getElementById("gambar").value;
            var harga = document.getElementById("harga").value;
            var stok = document.getElementById("stok").value;
            var nama_kategori = document.getElementById("nama_kategori").value;
            var nama_supplier = document.getElementById("nama_supplier").value;

            if (nama_varian.trim() === '' || gambar.trim() === '' || harga.trim() === '' || stok.trim() === '' || nama_kategori.trim() === '' || nama_supplier.trim() === '') {
                alert("Harap isi semua kolom!");
                return false;
            } else {
                alert("Data Berhasil Ditambahkan");
                return true;
            }
        }
    </script>
    <style>
        body {
            padding: 50px;
            background-color: lightblue;
        }

        h1 {
            margin-bottom: 40px;
            font-size: 40px;
        }
    </style>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <a class="btn btn-success" style="margin-bottom:5px; margin-top:20px;" href="admin.php"> Kembali </a>
                <h1 style="margin-bottom:5px">Tambah Data</h1>
                <?php
                include 'koneksi.php';
                ?>
                <form style="margin-top: 20px" action="proses_tambah.php" method="post" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="nama_varian">Varian:</label>
                        <input type="text" class="form-control" id="nama_varian" name="nama_varian">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar:</label>
                        <input type="file" name="gambar">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok:</label>
                        <input type="text" class="form-control" id="stok" name="stok">
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Kategori:</label>
                        <select name="kategori_id" id="kategori_id">
                            <?php
                            // Fetch data from the "items" table
                            $query = mysqli_query($conn, "SELECT * FROM kategori");
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    echo "<option value='" . $data["id"] . "'>" . $data["id"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No items available</option>";
                            }
                            ?>
                        </select>
                        <p>1. Kukus | 2. Bakar | 3. Gulung</p>
                    </div>
                    <div class="form-group">
                        <label for="supplier_id">Supplier:</label>
                        <select name="supplier_id" id="supplier_id">
                            <?php
                            // Fetch data from the "items" table
                            $query = mysqli_query($conn, "SELECT * FROM supplier");
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    echo "<option value='" . $data["id"] . "'>" . $data["id"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No items available</option>";
                            }
                            ?>
                        </select>
                        <p>1. Bolu Susu Lembang | 2. Ibu Otang | 3. Amanda</p>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>