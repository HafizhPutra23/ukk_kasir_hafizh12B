<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang dikirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];
$TanggalPenjualan = $_POST['TanggalPenjualan'];

// cek apakah pelanggan dengan nama yang sama sudah ada
$result = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE NamaPelanggan='$NamaPelanggan'");
if(mysqli_num_rows($result) > 0) {
    // pelanggan sudah ada, perbarui tanggal penjualan
    $data = mysqli_fetch_array($result);
    $PelangganID = $data['PelangganID'];
    mysqli_query($koneksi, "UPDATE penjualan SET TanggalPenjualan='$TanggalPenjualan' WHERE PelangganID='$PelangganID'");
} else {
    // pelanggan belum ada, tambahkan pelanggan baru
    $PelangganID = $_POST['PelangganID'];// generate ID pelanggan baru
    mysqli_query($koneksi,"INSERT INTO pelanggan VALUES ('$PelangganID','$NamaPelanggan','$Alamat','$NomorTelepon')");
    mysqli_query($koneksi,"INSERT INTO penjualan VALUES ('','$TanggalPenjualan','','$PelangganID')");
}

// mengalihkan halaman kembali ke pembelian.php dengan pesan simpan
header("location:pembelian.php?pesan=simpan");
?>