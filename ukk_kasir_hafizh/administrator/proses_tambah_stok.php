<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$ProdukID = $_POST['ProdukID'];
$TambahStok = $_POST['TambahStok'];

// mendapatkan nilai stok saat ini
$result = mysqli_query($koneksi, "SELECT Stok FROM produk WHERE ProdukID='$ProdukID'");
$row = mysqli_fetch_assoc($result);
$Stok = $row['Stok'];

// menambahkan stok
$Stok_total = $Stok + $TambahStok;

// update data ke database
mysqli_query($koneksi,"UPDATE produk SET Stok='$Stok_total' WHERE ProdukID='$ProdukID'");

// mengalihkan halaman kembali ke data_barang.php
header("location:data_barang.php?pesan=update");

?>