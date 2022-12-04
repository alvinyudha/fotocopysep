<style>
    .table-container {
        overflow: auto;
        width: 100%;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?> Harian</h1>
    <div class="row mb-1">
        <div class="card-body">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Filter Tanggal</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= base_url('laporan/laporan_harian') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pilih Tanggal</label>
                            <div class="row d-flex justify-content-center">
                                <input type="date" class="form-control col col-lg-4" name="hari1">
                                <span class="input-group-text"><b>to</b></span>
                                <input type="date" class="form-control col col-lg-4" name="hari2">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer p-3 border-top-0 bg-transparent">
                        <button type="submit" class="btn btn-primary swalDefaultSuccess">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="table-container">
                            <table id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Order</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Tanggal</th>
                                        <th>Telepon</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pesanan_diproses as $p) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $p['no_order']; ?></td>
                                            <td><?= $p['nama_penerima']; ?></td>
                                            <td><?= date_format(new DateTime($p['tanggal']), "d F Y"); ?></td>
                                            <td><?= $p['telp_penerima']; ?></td>
                                            <td><b>Rp. <?= number_format($p['total_bayar']) ?></b><br>
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
<!-- End of Main Content -->

<!-- Modal Kirim -->
<?php foreach ($pesanan_diproses as $p) : ?>
    <div class="modal fade" id="kirim<?= $p['id_transaksi'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><strong><?= $p['no_order'] ?></strong></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart() ?>
                    <table>
                        <tr>
                            <th></th>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal" type="button">Tutup</button>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>