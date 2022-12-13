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
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-pesanan-tab" data-toggle="pill" href="#custom-tabs-four-pesanan" role="tab" aria-controls="custom-tabs-four-pesanan" aria-selected="true">Pesanan Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-diproses-tab" data-toggle="pill" href="#custom-tabs-four-diproses" role="tab" aria-controls="custom-tabs-four-diproses" aria-selected="false">Pesanan Selesai</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-pesanan" role="tabpanel" aria-labelledby="custom-tabs-four-pesanan-tab">
                            <div class="table-container">
                                <table class="table">
                                    <tr>
                                        <th>No Order</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Telepon</th>
                                        <th>Total Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($pesanan as $p) : ?>
                                        <tr>
                                            <td><?= $p['no_order']; ?></td>
                                            <td><?= $p['nama_penerima']; ?></td>
                                            <td><?= $p['tanggal']; ?></td>
                                            <td><?= $p['telp_penerima']; ?></td>
                                            <td><b>Rp. <?= number_format($p['total_bayar']) ?></b><br>
                                                <?php if ($p['status_bayar'] == 0) { ?>
                                                    <span class="badge badge-danger">Belum Bayar</span>
                                                <?php } elseif ($p['status_bayar'] == 1) { ?>
                                                    <span class="badge badge-success">Sudah Bayar</span>
                                                    <span class="badge badge-info">Menunggu Verifikasi</span>
                                                <?php } elseif ($p['status_bayar'] == 2) { ?>
                                                    <span class="badge badge-warning">Bayar COD</span>
                                                <?php } ?>
                                            </td>
                                            <th>
                                                <div class="toolbox">
                                                    <a href="" class="badge badge-success" data-toggle="modal" data-target="#editModal<?= $p['id_transaksi']; ?>"> <i class="fa fa-edit"></i>Edit</a>
                                                    <?php if ($p['status_bayar'] == 1 || $p['status_bayar'] == 2) { ?>
                                                        <a href="" class="<?= ($p['status_bayar'] == 1) ? "" : "d-none" ?> btn btn-sm btn btn-success" data-toggle="modal" data-target="#cek<?= $p['id_transaksi'] ?>">Cek Bukti Bayar</a>
                                                        <a data-toggle="modal" data-target="#cek<?= $p['id_transaksi'] ?>" class="btn btn-sm btn-primary">Proses</a>
                                                    <?php } ?>
                                                </div>
                                            </th>
                                            <td>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-diproses" role="tabpanel" aria-labelledby="custom-tabs-four-diproses-tab">
                            <div class="table-container">
                                <table class="table">
                                    <tr>
                                        <th>No Order</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Telepon</th>
                                        <th>Total Bayar</th>
                                        <th>No. Resi</th>
                                    </tr>
                                    <?php foreach ($pesanan_diproses as $p) : ?>
                                        <tr>
                                            <td><?= $p['no_order']; ?></td>
                                            <td><?= $p['nama_penerima']; ?></td>
                                            <td><?= $p['tanggal']; ?></td>
                                            <td><?= $p['telp_penerima']; ?></td>
                                            <td><b>Rp. <?= number_format($p['total_bayar']) ?></b><br>
                                                <span class="badge badge-primary">Diproses</span>
                                            </td>
                                            <td><?= $p['no_resi']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
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
<!-- End of Main Content -->

<!-- Modal Cek Bukti Pembayaran -->
<?php foreach ($pesanan as $p) : ?>
    <div class="modal fade" id="cek<?= $p['id_transaksi'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><strong><?= $p['no_order'] ?></strong></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pesananmasuk/proses/' . $p['id_transaksi']) ?>" method="POST">
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th>No. Resi</th>
                                <th>:</th>
                                <td><input type="text" class="form-control" name="no_resi"></td>
                            <tr>
                                <th>Nama Bank</th>
                                <th>:</th>
                                <td><?= $p['nama_bank'] ?></td>
                            </tr>
                            <tr>
                                <th>No Rekening</th>
                                <th>:</th>
                                <td><?= $p['no_rek'] ?></td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <th>:</th>
                                <td><?= $p['atas_nama'] ?></td>
                            </tr>
                            <tr>
                                <th>Total Bayar</th>
                                <th>:</th>
                                <td>Rp. <?= number_format($p['total_bayar']); ?></td>
                            </tr>
                            </tr>
                        </table>
                        <img src="<?= base_url('assets/img/buktibayar/') . $p['bukti_bayar']; ?>" class="img-fluid pad">
                        <button type="submit" class="btn btn-sm btn-success">Proses Pengiriman</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>


<!-- Modal Edit -->
<?php $no = 0;
foreach ($pesanan as $p) : $no++ ?>
    <div class="modal fade" id="editModal<?= $p['id_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="#editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Harga</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?php echo form_open_multipart('pesananmasuk/edit/' . $p['id_transaksi']) ?>
                <div class="modal-body">
                    <input type="hidden" name="id_transaksi" value="<?= $p['id_transaksi'] ?>">

                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control" id="total_bayar" name="total_bayar" value="<?= $p['total_bayar']; ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" name="tutup" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>