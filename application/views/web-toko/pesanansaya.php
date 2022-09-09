<style>
    .table-container {
        overflow: auto;
    }
</style>

<body class="hold-transition layout-top-nav">
    <!-- Default box -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> <?= $tittle ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('website') ?>">Fotocopy SEP</a></li>
                            <li class="breadcrumb-item active"><?= $tittle ?></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="container p-3 border-top-0 bg-transparent px-lg-5 align-items-stretch justify-content-center">
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                    <?= $this->session->flashdata('batal') ?>
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-pesanan-tab" data-toggle="pill" href="#custom-tabs-four-pesanan" role="tab" aria-controls="custom-tabs-four-pesanan" aria-selected="true">Pesanan</a>
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
                                    <div class="row"><span>Klik Cetak Untuk Melakukan Pembayaran Secara Tunai</span></div> <br>
                                    <div class="table-container">
                                        <table class="table">
                                            <tr>
                                                <th>No Order</th>
                                                <th>Tanggal</th>
                                                <th>Telepon</th>
                                                <th>Total Bayar</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php foreach ($belum_bayar as $b) : ?>
                                                <tr>
                                                    <td><?= $b['no_order']; ?></td>
                                                    <td><?= $b['tanggal']; ?></td>
                                                    <td><?= $b['telp_penerima']; ?></td>
                                                    <td><b>Rp.<?= number_format($b['total_bayar']) ?></b><br>
                                                        <?php if ($b['status_bayar'] == 0) { ?>
                                                            <span class="badge badge-warning">Belum Bayar</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-success">Sudah Bayar</span>
                                                            <span class="badge badge-info">Menunggu Verifikasi</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($b['status_bayar'] == 0) { ?>
                                                            <a href="<?= base_url('pesanansaya/bayar/' . $b['id_transaksi']) ?>" class="btn btn-sm btn-primary">Bayar</a>
                                                            <a href="<?= base_url('pesanansaya/hapus/' . $b['id_transaksi']) ?>" class="btn btn-sm btn-danger">Batalkan</a>
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
                                                <th>Tanggal</th>
                                                <th>Telepon</th>
                                                <th>Total Bayar</th>
                                            </tr>
                                            <?php foreach ($diproses as $d) : ?>
                                                <tr>
                                                    <td><?= $d['no_order']; ?></td>
                                                    <td><?= $d['tanggal']; ?></td>
                                                    <td><?= $d['telp_penerima']; ?></td>
                                                    <td><b>Rp.<?= number_format($d['total_bayar']) ?></b><br>
                                                        <?php if ($d['status_bayar'] == 0) { ?>
                                                            <span class="badge badge-warning">Belum Bayar</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-success">Terverifikasi</span>
                                                            <span class="badge badge-primary">Diproses</span>
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