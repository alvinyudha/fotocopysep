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
        <div class="container card card-solid px-4 px-lg-5 align-items-stretch">
            <div class="card-body pb-0">
                <div class="row justify-content-center">
                    <?php foreach ($cetakfoto as $c) : ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <h4>
                                        <?= $c['paket'] ?>
                                    </h4>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="col-5">
                                        <img src="<?= base_url('/assets/barang/') . $c['gambar']; ?>" class="img-fluid">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-left">
                                                <h5>
                                                    <span class="badge bg-success">Rp.<?= number_format($c['harga']) ?></span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="text-right">
                                                <?= form_open('website/formcetak/' . $c['id']) ?>
                                                <button class="btn btn-sm btn-primary" type="submit">
                                                    <input class="d-none" type="text" name="ukuran" value="<?= $c['paket'] ?>">
                                                    Pilih
                                                </button>
                                                <?= form_close() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>