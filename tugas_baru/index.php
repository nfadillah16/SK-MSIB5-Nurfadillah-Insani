<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        img {
            width: 50px;
        }

        h3 {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ALLA CAKE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Home</a>
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
    <div class="container mt-5">
        <center><h1>ALLA CAKE</h1></center>
        <div class="row">
            <?php
            include 'koneksi.php';
            $query = mysqli_query($conn, "SELECT nama_varian, gambar, harga from varian;");
            ?>
            <?php
            if ($query->num_rows > 0) {
                while ($data = $query->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card">
                            <center><img src="<?php echo $data['gambar']; ?>" class="card-img-top"
                                    alt="<?php echo $data['nama_varian']; ?>"></center>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $data['nama_varian']; ?>
                                </h5>
                                <p class="card-text">Harga:
                                    <?php echo $data['harga']; ?>
                                </p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
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