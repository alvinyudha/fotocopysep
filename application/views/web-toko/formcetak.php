<body class="hold-transition layout-top-nav">
    <!-- Default box -->
    <div class="content-wrapper">
        <!-- Content Header (Page ) -->
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
        <div class="container">

            <div class="row">

                <div class="card-body">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Print <?= $foto['paket']; ?></strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="<?= base_url('website/tambahformcetak') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="file">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="nama" class="custom-file-input" id="nama">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ukuran">Ukuran</label>
                                    <input type="text" class="form-control" name="ukuran" value="<?= $foto['paket'][0] . $foto['paket'][1] . $foto['paket'][2]; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" min="<?= $foto['lembar']; ?>" value="<?= $foto['lembar']; ?>">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="d-none form-control" name="harga" value="<?= ($foto['harga'] / $foto['lembar']); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="d-none form-control" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer p-3 border-top-0 bg-transparent">
                                <button type="submit" class="btn btn-primary  swalDefaultSuccess">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>