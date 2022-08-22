<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <table class="table table-hoover">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Stok</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($barang as $b) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $b['nama_barang']; ?></td>
                    <td>Rp.<?= number_format($b['harga_jual']); ?></td>
                    <td><?= $b['stok']; ?></td>
                    <td>
                        <a href="<?= base_url('transaksi/beli') . $b['id_barang']; ?>" class="badge badge-success">beli</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>


    </table>
</div>
<hr>
<hr class="sidebar-divider d-none d-md-block">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div>
                <h1 class="h3 mb-4 text-gray-800">Keranjang Belanja</h1>
                <h4>Kode Penjualan <?= $kode_jual; ?> </h4>

                <table class="table table-hoover">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Jumlah Beli</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($detail_beli as $beli) : ?>
                        <tr>
                            <td scope="col"><?php echo $no; ?></td>
                            <td scope="col"><?php echo $beli->nama_barang; ?></td>
                            <td scope="col">Rp.<?php echo number_format($beli->harga_satuan);  ?></td>
                            <td scope="col"><?php echo $beli->jumlah_beli; ?></td>
                            <td scope="col">Rp.<?php echo number_format($beli->harga_satuan * $beli->jumlah_beli);  ?></td>
                            <td scope="col"><a href="<?= base_url('transaksi/hapus/') . $kode_jual . '-' . $beli->id_produk; ?>" class="badge badge-success">hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>

                </table>

            </div>
        </div>
    </div>
</div>