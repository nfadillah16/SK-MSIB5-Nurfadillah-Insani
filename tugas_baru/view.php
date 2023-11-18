<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        h1 {
            margin-bottom: 50px;
        }

        img {
            margin-bottom: 30px;
            border-radius: 50%;
            width: 300px;
            height: 300px !important;
        }
        body {
            background-image: url("image/bg1.jpg");
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM varian WHERE id = $id");

        if ($query->num_rows > 0) {
            $data = $query->fetch_assoc();
            ?>
            <div class="row">
                <div class="col-12">
                    <center>
                        <h1>
                            <?php echo $data['nama_varian']; ?>
                        </h1>
                        <img src="<?php echo $data['gambar']; ?>" class="img-fluid"
                            alt="<?php echo $data['nama_varian']; ?>">
                        <p><strong>Harga:</strong> Rp.
                            <?php echo $data['harga']; ?>
                        </p>
                        <a href="index.php" class="btn btn-primary">Kembali</a>
                    </center>
                </div>
            </div>
            <?php
        } else {
            echo "Product not found";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>