<?php
include "header.php";
include "navbar.php";
?>
<div class="card mt-2">
    <div class="card-body">

        <?php 
        include '../koneksi.php';
        $PelangganID = $_GET['PelangganID'];
        $no = 1;
        $data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
        while($d = mysqli_fetch_array($data)){
            ?>
            <?php if ($d['PelangganID'] == $PelangganID) { ?>
                <table>
                    <tr>
                        <td>Tanggal</td>
                        <td>: <?php echo $d['TanggalPenjualan']; ?></td>
                    </tr>
                    <tr>
                        <td>ID Pelanggan</td>
                        <td>: <?php echo $d['PelangganID']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td>: <?php echo $d['NamaPelanggan']; ?></td>
                    </tr>
                    <tr>
                        <td>No. Telepon</td>
                        <td>: <?php echo $d['NomorTelepon']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?php echo $d['Alamat']; ?></td>
                    </tr>
                    <tr>
                        <td>Total Pembelian</td>
                        <td>: Rp. <?php echo $d['TotalHarga']; ?></td>
                    </tr>
                </table>

                <form method="post" action="tambah_detail_penjualan.php">
                    <input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
                    <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
                </form>

                <form method="post" action="lihat_nota.php" onsubmit="return openPopup(this);">
                    <input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
                    <button type="submit" class="btn btn-success btn-sm mt-1">Lihat Nota</button>
                </form>

                <table class="table">
                    <div class="mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Beli</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    </div>
                    <tbody>
                        <?php 
                        include '../koneksi.php';
                        $nos = 1;
                        $detailpenjualan = mysqli_query($koneksi,"SELECT * FROM detailpenjualan");
                        while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
                            ?>
                            <?php 
                            if ($d_detailpenjualan['PenjualanID'] == $d['PenjualanID']) { ?>
                                <tr>
                                    <td><?php echo $nos++; ?></td>
                                    <td>
                                        <?php 
                                        $produk = mysqli_query($koneksi,"SELECT * FROM produk WHERE ProdukID = '".$d_detailpenjualan['ProdukID']."'");
                                        $d_produk = mysqli_fetch_array($produk);
                                        echo $d_produk['NamaProduk']; 
                                        ?>
                                    </td>
                                    <td><?php echo $d_detailpenjualan['JumlahProduk']; ?></td>
                                    <td><?php echo $d_detailpenjualan['Subtotal']; ?></td>
                                </tr>
                            <?php } else {
                                ?>
                                <?php 
                            }
                        } 
                        ?>
                    </tbody>
                </table>

                <form method="post" action="simpan_total_harga.php">
                    <?php 
                    include '../koneksi.php';
                    $detailpenjualan = mysqli_query($koneksi, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE  PenjualanID='".$d['PenjualanID']."'"); 
                    $row = mysqli_fetch_assoc($detailpenjualan); 
                    $sum = $row['TotalHarga'];
                    ?>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" name="TotalHarga" readonly value="<?php echo $sum; ?>">
                                <input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
                                <input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <?php 
            } 
        } 
        ?>      
    </div>
    <a href="data_barang.php" class="btn btn-danger">Kembali</a> <!-- Ganti dengan tautan halaman yang sesuai -->
</div>

<?php
include "footer.php";
?>