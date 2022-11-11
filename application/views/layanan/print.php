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
        <div class="container">

            <div class="row">

                <div class="card-body">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Print</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= base_url('layanan/tambahfilecetak') ?>" method="post" enctype="multipart/form-data">
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
                                    <select class="form-select" aria-label="Default select example" name="ukuran">
                                        <option selected>Pilih Ukuran</option>
                                        <option value="Full Kertas Foto A4">Full Kertas Foto A4</option>
                                        <option value="A4">A4</option>
                                        <option value="A5">A5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" min="1">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Harga</label>
                                    <select class="form-select" aria-label="Default select example" name="harga">
                                        <option selected>Pilih Harga</option>
                                        <option value="10000">Full Kertas Foto A4 Rp.10000/lbr</option>
                                        <option value="100">Rp.100/lbr Hitam Putih</option>
                                        <option value="500">Rp.500/lbr Warna</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="d-none form-control" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="d-none form-control" name="nama_pelanggan" value="<?= $tb_user['name'] ?>">
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

        </div>