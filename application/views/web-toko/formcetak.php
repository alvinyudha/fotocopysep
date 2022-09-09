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

                        <form action="<?= base_url('website/tambahformcetak') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="file">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="nama" class="custom-file-input" id="file">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group d-none">

                                    <input type="text" name="ukuran" value="<?= $foto['paket'] ?>">
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