<!DOCTYPE html>
<html>

<head>
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
    <style>
        aside {
            background-color: grey !important;
        }

        span {
            margin-left: 18px;
        }

        body {
            background-color: lightgrey;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <strong>
            <aside class="main-sidebar sidebar-light-primary elevation-4"
                style="position: fixed; top: 0; left: 0; bottom: 0;">
                <center>
                    <img src="image/admin.jpg" alt=""
                        style="width: 150px; height: 150px; border-radius: 100%; padding: 20px; ">
                </center>
                <a href="#" class="brand-link">
                    <span class="brand-text">ADMIN ALLA CAKE</span>
                </a>

                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="about.php" class="nav-link">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>About</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
        </strong>
        <div class="container" style="width: 80%; margin-left: 250px;">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    include 'koneksi.php';
                    $query = mysqli_query($conn, "SELECT v.id, v.nama_varian, v.gambar, v.harga, v.stok, k.nama_kategori, s.nama_supplier FROM varian AS v JOIN kategori AS k ON v.kategori_id=k.id JOIN supplier AS s ON v.supplier_id=s.id");
                    ?>
                    <center>
                        <h1>DATA ALLA CAKE :</h1>
                    </center>
                    <a class="btn btn-info" style="margin-bottom:5px" href="tambah.php?nama_halaman=NAMA HALAMAN NYA">
                        Tambah </a>
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Varian
                                </th>
                                <th style="width: 160px;">
                                    Gambar
                                </th>
                                <th>
                                    Harga
                                </th>
                                <th>
                                    Stok
                                </th>
                                <th>
                                    Kategori
                                </th>
                                <th>
                                    Supplier
                                </th>
                                <th>
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($query) > 0) {
                                while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $data["nama_varian"] ?>
                                        </td>
                                        <td> <img src="<?php echo $data["gambar"] ?>" width="150"> </td>
                                        <td>
                                            <?php echo $data["harga"] ?>
                                        </td>
                                        <td>
                                            <?php echo $data["stok"] ?>
                                        </td>
                                        <td>
                                            <?php echo $data["nama_kategori"] ?>
                                        </td>
                                        <td>
                                            <?php echo $data["nama_supplier"] ?>
                                        </td>
                                        <td> <a href="hapus.php?id=<?php echo $data["id"] ?>" class="label label-danger">
                                                Hapus </a> &nbsp; <a href="edit.php?id=<?php echo $data["id"] ?>"
                                                class="label label-warning"> Ubah </a></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>