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
                <div class="col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">No Rekening Toko</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <p>Silahkan Transfer Ke No Rekening Di Bawah Ini Sebesar :
                                <h1 class="text-primary">Rp.<?= number_format($pesanan->total_bayar, 0) ?>.-</h1>
                                </p><br>
                                <table class="table">
                                    <tr>
                                        <th>Bank</th>
                                        <th>No Rekening</th>
                                        <th>Atas Nama</th>
                                    </tr>
                                    <?php foreach ($rekening as $r) : ?>
                                        <tr>
                                            <td><?= $r->nama_bank ?> </td>
                                            <td><?= $r->no_rek ?> </td>
                                            <td><?= $r->atas_nama ?> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- left column -->
                <div class="col-sm-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Upload Bukti Pembayaran </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?= form_open_multipart('pesanansaya/bayar/' . $pesanan->id_transaksi) ?>
                        <div class="card-body">
                            <input type="hidden" name="id_transaksi" value="<?= $pesanan->id_transaksi ?>">
                            <div class="form-group">
                                <label>Atas Nama</label>
                                <input name="atas_nama" class="form-control" placeholder="Atas Nama" value="<?= $pesanan->atas_nama ?>">
                                <?= form_error('atas_nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input name="nama_bank" class="form-control" placeholder="Nama Bank" value="<?= $pesanan->nama_bank ?>">
                                <?= form_error('nama_bank', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>No Rekening</label>
                                <input name="no_rek" class="form-control" placeholder="No Rekening" value="<?= $pesanan->no_rek ?>">
                                <?= form_error('no_rek', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Bukti Bayar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="bukti_bayar">
                                        <label class="custom-file-label">Pilih File</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <img src="<?= base_url('assets/img/buktibayar/') . $pesanan->bukti_bayar ?>" class="img-thumbnail">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Kirim</button>
                            <a href="<?= base_url('pesanansaya') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>