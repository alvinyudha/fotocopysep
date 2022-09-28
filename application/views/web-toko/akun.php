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
                    <?php
                    if ($this->session->flashdata('ubah')) {
                        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>';
                        echo $this->session->flashdata('ubah');
                        echo '</div>';
                    }
                    ?>
                    <div class="card card-info card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-alamat-tab" data-toggle="pill" href="#custom-tabs-four-alamat" role="tab" aria-controls="custom-tabs-four-alamat" aria-selected="false">Alamat</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                    <!-- /Breadcrumb -->

                                    <div class="row gutters-sm">
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <?= form_open_multipart('pelanggan') ?>
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>" class="img-thumbnail rounded-circle" width="150">
                                                        <div class="row">
                                                            <div class="mt-3">
                                                                <h4><strong><?= $tb_user['name'] ?></strong></h4>
                                                                <p class="card-text">Member Since <?= date('d F Y', $tb_user['date_created']); ?></p>
                                                                <div class="form-group">
                                                                    <label for=""></label>
                                                                    <input type="file" class="form-control" id="image" name="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mt-3">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex justify-content-center align-items-center flex-wrap">
                                                        <a href="<?= base_url('pelanggan/ubahpassword/' . $tb_user['id_user']) ?>" style="cursor: pointer;" class="btn btn-success">
                                                            Ubah Kata Sandi
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card mb-3 ">
                                                <div class="card-body ">
                                                    <?= form_open_multipart('pelanggan') ?>
                                                    <div class="row mb-3">
                                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="email" name="email" value="<?= $tb_user['email'] ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="name" name="name" value="<?= $tb_user['name'] ?>">
                                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="ttl" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" id="ttl" name="ttl" value="<?= $tb_user['ttl'] ?>">
                                                            <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="kelamin" name="kelamin" value="<?= $tb_user['kelamin'] ?>">
                                                            <?= form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="kelamin" value="Pria" <?= ($tb_user['kelamin'] == "Pria" || $tb_user['kelamin'] == "pria") ? set_radio('kelamin', 'pria', true) : "" ?>>
                                                                <label class="form-check-label">
                                                                    Pria
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="kelamin" value="Wanita" <?= ($tb_user['kelamin'] == "Wanita" || $tb_user['kelamin'] == "wanita") ? set_radio('kelamin', 'wanita', true) : "" ?>>
                                                                <label class="form-check-label">
                                                                    Wanita
                                                                </label>
                                                            </div>
                                                            <?= form_error('kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="telepon" class="col-sm-3 col-form-label">Nomor HP</label>
                                                        <div class="col-sm-9">
                                                            <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $tb_user['telepon'] ?>">
                                                            <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row justify-content-end">
                                                        <div class="col-sm-9 ">
                                                            <button class="btn btn-success" type="submit">Simpan</button>
                                                            <a href="<?= base_url('website'); ?>" class="btn btn-danger ">Kembali</a>
                                                        </div>
                                                    </div>
                                                    <?= form_close() ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="custom-tabs-four-alamat" role="tabpanel" aria-labelledby="custom-tabs-four-alamat-tab">
                                    <div class="card w-75">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong><?= $tb_user['name'] ?></strong></h5>
                                            <p class="card-text"><?= $tb_user['telepon'] ?></p>
                                            <p class="card-text"><?= $tb_user['alamat'] ?></p>
                                            <div class="mt-4">
                                                <a style="cursor: pointer;" class="badge badge-success" data-toggle="modal" data-target="#modal-default<?= $tb_user['id_user'] ?>">
                                                    Ubah Alamat
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                                    test 3
                                </div> -->
                            </div>
                            <br>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Edit -->
    <?php foreach ($user as $u) : ?>
        <div class="modal fade" id="modal-default<?= $u['id_user'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Ubah Alamat</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('pelanggan/edit/' . $u['id_user']) ?>
                    <div class="modal-body">
                        <input type="hidden" name="id_user" value="<?= $u['id_user'] ?>">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3"><?= $u['alamat'] ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Penerima</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $u['name'] ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Nomor HP</label>
                            <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $u['telepon'] ?>">
                            <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center mb-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    <?= form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php endforeach ?>