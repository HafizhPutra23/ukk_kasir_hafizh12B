<?php
include "header.php";
include "../koneksi.php"; // Impor koneksi.php

$PenjualanID = $_POST['PenjualanID'];
$query = "SELECT * FROM penjualan WHERE PenjualanID='$PenjualanID'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
?>
<style>
    /* Styling lainnya di sini */
    body {
			background-color:  #FFE3CA;
		}
    /* CSS untuk cetak */
    @media print {
        

        .container, .container * {
            visibility: visible;
        }

        .container {
            position: absolute;
            left: 0;
            top: 0;
        }
        .nota {
            display: none;
        }
    }

    .bg-nota {
        margin-bottom: 10rem;
    }
</style>
<div class="container bg-nota">
    <div class="d-flex justify-content-between align-items-center ">
        <h2 class="mt-5 mb-5 text-black">Nota</h2>
    </div>
    <div class="card ">
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>ID Nota</td>
                    <td>: <?php echo $row['PenjualanID']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Penjualan</td>
                    <td>: <?php echo $row['TanggalPenjualan']; ?></td>
                </tr>
                <tr>
                    <td>ID Pelanggan</td>
                    <td>: <?php echo $row['PelangganID']; ?></td>
                </tr>
                <?php
                // Ambil data produk yang terkait dengan penjualan ini
                $query_detail = "SELECT * FROM detailpenjualan WHERE PenjualanID='$PenjualanID'";
                $result_detail = mysqli_query($koneksi, $query_detail);
                while ($row_detail = mysqli_fetch_assoc($result_detail)) {
                    $ProdukID = $row_detail['ProdukID'];
                    $query_produk = "SELECT * FROM produk WHERE ProdukID='$ProdukID'";
                    $result_produk = mysqli_query($koneksi, $query_produk);
                    $row_produk = mysqli_fetch_assoc($result_produk);
                    ?>
                    <tr>
                        <td>Nama Produk</td>
                        <td>: <?php echo $row_produk['NamaProduk']; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Beli</td>
                        <td>: <?php echo $row_detail['JumlahProduk']; ?></td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>: Rp. <?php echo $row_detail['Subtotal']; ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td>Total Pembelian</td>
                    <td>: Rp. <?php echo $row['TotalHarga']; ?></td>
                </tr>
            </table>
        </div>
        <button class="btn nota" onclick="window.print()">Cetak Nota</button>
    </div>
</div>