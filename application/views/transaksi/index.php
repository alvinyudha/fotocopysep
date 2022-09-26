<style>
    .table-container {
        overflow: auto;
        width: 100%;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('pesan') ?>
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="table-container">
                        <table id="dataTable" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No Order</th>
                                    <th scope="col">Gambar Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Merk</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama Pembeli</th>
                                    <th scope="col">Telp</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;
                            //print_r($detail_beli);
                            foreach ($detail_beli as $beli) : ?>
                                <tr>
                                    <td scope="col"><?php echo $no; ?></td>
                                    <td scope="col"><?php echo $beli['no_order']; ?></td>
                                    <td scope="col"><img src="<?= base_url('/assets/barang/') . $beli['gambar_barang']; ?>" width="100px" class="img-thumbnail"></td>
                                    <td scope="col"><?php echo $beli['nama_barang']; ?></td>
                                    <td scope="col"><?php echo $beli['qty']; ?></td>
                                    <td scope="col"><?php echo $beli['merk']; ?></td>
                                    <td scope="col"><?php echo $beli['nama_kategori']; ?></td>
                                    <td scope="col">Rp.<?php echo number_format($beli['harga_barang']);  ?></td>
                                    <td scope="col"><?php echo date("d M Y",strtotime($beli['tanggal'])); ?></td>
                                    <td scope="col"><?php echo $beli['nama_penerima']; ?></td>
                                    <td scope="col"><?php echo $beli['telp_penerima']; ?></td>
                                    <td scope="col">Rp.<?php echo number_format($beli['harga_barang']*$beli['qty']);  ?></td>
                                    </td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>