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
        <div class="container p-5 border-top-0 bg-transparent px-lg-5 align-items-stretch justify-content-center">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <?= $this->session->flashdata('ubah'); ?>
                    <form action="<?= base_url('pelanggan/ubahpassword'); ?>" method="post">
                        <div class="form-group">
                            <label for="current_password">Kata Sandi Lama</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <?= form_error('current_password', '<small class="text-danger pl-3 ">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password1">Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                            <?= form_error('new_password1', '<small class="text-danger pl-3 ">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password2">Ketik Ulang Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                            <?= form_error('new_password2', '<small class="text-danger pl-3 ">', '</small>'); ?>
                        </div>
                        <div class="form-group justify-content-center">
                            <button type="submit" class="btn btn-success">Ubah</button>
                            <a href="<?= base_url('pelanggan'); ?>" class="btn btn-danger ">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>