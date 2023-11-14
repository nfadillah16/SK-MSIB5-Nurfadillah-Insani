<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_varian = $_POST['nama_varian'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori_id = $_POST['kategori_id'];
    $supplier_id = $_POST['supplier_id'];

    // Upload Proses
    $target_dir = "image/"; // path directory image akan di simpan
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]); // full path dari image yg akan di simpan
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["gambar"]["name"])) . " has been uploaded.<br>";
    } else {
        echo "Sorry, there was an error uploading your file.<br>";
    }


    $result = mysqli_query($conn, "INSERT INTO varian (nama_varian, gambar, harga, stok, kategori_id, supplier_id) VALUES ('$nama_varian', '$target_file', '$harga', '$stok', '$kategori_id', '$supplier_id')");
}
header("Location:admin.php");
?>