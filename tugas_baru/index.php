<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        img {
            width: 200px !important;
            height: 200px;
            border-radius: 100%;
        }

        h3 {
            margin-top: 20px;
        }

        h1 {
            margin-bottom: 50px;
        }

        .navbar {
            background-color: lightgrey !important;
        }

        .card {
            border: 0px;
            margin-bottom:70px;
            background-color: transparent;
        }

        body {
            background-image: url("image/bg1.jpg");
        }
    </style>
</head>

<body>
    <strong>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ALLA CAKE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                </ul>
            </div>
        </nav>
    </strong>
    <div class="container mt-5">
        <center>
            <h1>PRODUK ALLA CAKE</h1>
        </center>
        <div class="row">
            <?php
            include 'koneksi.php';
            $query = mysqli_query($conn, "SELECT * from varian;");
            ?>
            <?php
            if ($query->num_rows > 0) {
                while ($data = $query->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <center><img src="<?php echo $data['gambar']; ?>" class="card-img-top"
                                    alt="<?php echo $data['nama_varian']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $data['nama_varian']; ?>
                                    </h5>
                                    <p class="card-text">Harga:
                                        <?php echo $data['harga']; ?>
                                    </p>
                                    <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">View Details</a>
                                </div>
                            </center>
                        </div>
                    </div>
                <?php }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>