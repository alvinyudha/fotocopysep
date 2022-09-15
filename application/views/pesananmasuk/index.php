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
                            <a class="nav-link" id="custom-tabs-four-diproses-tab" data-toggle="pill" href="#custom-tabs-four-diproses" role="tab" aria-controls="custom-tabs-four-diproses" aria-selected="false">Diproses</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-selesai-tab" data-toggle="pill" href="#custom-tabs-four-selesai" role="tab" aria-controls="custom-tabs-four-selesai" aria-selected="false">Selesai</a>
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
                                                    <span class="badge badge-warning">Belum Bayar</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-success">Sudah Bayar</span>
                                                    <span class="badge badge-info">Menunggu Verifikasi</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($p['status_bayar'] == 1) { ?>
                                                    <a href="" class="btn btn-sm btn btn-success" data-toggle="modal" data-target="#cek<?= $p['id_transaksi'] ?>">Cek Bukti Bayar</a>
                                                    <a href="<?= base_url('pesananmasuk/proses/' . $p['id_transaksi']) ?>" class="btn btn-sm btn-primary">Proses</a>
                                                <?php } ?>
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
                                        <th>Action</th>
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
                                            <td>
                                                <?php if ($p['status_bayar'] == 1) { ?>
                                                    <a href="" data-toggle="modal" data-target="#kirim<?= $p['id_transaksi'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-send"></i> Kirim</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="custom-tabs-four-selesai" role="tabpanel" aria-labelledby="custom-tabs-four-selesai-tab">
                            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
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
                <div class="modal-body">
                    <table class="table">
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
                    </table>
                    <img src="<?= base_url('assets/img/buktibayar/') . $p['bukti_bayar']; ?>" class="img-fluid pad">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>


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