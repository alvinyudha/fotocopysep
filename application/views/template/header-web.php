<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $tittle ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/favicon.ico" />
    <script src="https://kit.fontawesome.com/d7df0870cd.js" crossorigin="anonymous"></script>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('templateLTE/') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('templateLTE/') ?>/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('templateLTE/') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url('templateLTE/') ?>/plugins/toastr/toastr.min.css">



</head>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container ">
        <a class="navbar-brand" href="<?= base_url('website') ?>">Fotocopy SEP</a>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('website') ?>" class="nav-link">Home</a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <?php foreach ($kategori as $k) : ?>
                            <li><a class="dropdown-item" href="<?= base_url('website/kategori/') . $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <!-- End Level two -->
            </ul>
            <!-- SEARCH FORM not XS-->
            <?php echo form_open('website/search') ?>
            <div class="form-inline ml-0 ml-md-3 d-none d-sm-block">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" name="keyword" type="search" placeholder="Search" aria-label="Search" style="width: 500px;" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <?php echo form_open('website/search') ?>
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" name="keyword" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </li>
            <!-- Cart Dropdown Menu -->
            <?php
            $keranjang = $this->cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $key => $value) {
                $jml_item = $jml_item + $value['qty'];
            }
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <?php if (empty($keranjang)) { ?>
                        <a href="#" class="dropdown-item">
                            <p>Keranjang Kosong</p>
                        </a>
                        <?php } else {
                        foreach ($keranjang as $key => $value) {
                            $barang = $this->m_model->getDataBarangById($value['id']);
                            $foto = $this->m_model->getDataFotoById($value['id']);
                        ?>
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <img src="<?= base_url('/assets/barang/') . $barang['gambar_barang']  ?>" class="img-size-50 mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            <?= $value['name'] ?>
                                        </h3>
                                        <p class="text-sm"><?= $value['qty'] ?> X Rp.<?= number_format($value['price']) ?></p>
                                        <p class="text-sm text-muted"><i class="fa fa-calculator"></i> Rp.<?= $this->cart->format_number($value['subtotal']) ?></p>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>

                            <?php } ?>
                            <!-- cart end -->
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <div class="media-body">
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="right"><strong>Total :</strong></td>
                                            <td class="right">Rp.<?= $this->cart->format_number($this->cart->total()); ?></td>
                                        </tr>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">Lihat</a>
                                <a href="<?= base_url('belanja/checkout') ?>" class="dropdown-item dropdown-footer">Check Out</a>
                            <?php } ?>
                </div>
            </li>

            <?php
            $keranjang = $this->db->get_where('tb_filepesanan', ['status' => 0, 'id_user' => $this->session->userdata('id_user')])->num_rows();
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-file"></i>
                    <span class="badge badge-danger navbar-badge"><?= $keranjang ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <?php if (empty($keranjang)) { ?>
                        <a href="#" class="dropdown-item">
                            <p>Cetakan Kosong</p>
                        </a>
                        <?php } else {
                        $barang = $this->db->get_where('tb_filepesanan', ['status' => 0, 'id_user' => $this->session->userdata('id_user')])->result_array();
                        foreach ($barang as $value) {
                        ?>
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <img src="<?= base_url('/assets/barang/') . $value['nama']  ?>" class="img-size-50 mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            <?= $value['nama'] ?>
                                        </h3>
                                        <p class="text-sm">Jumlah: <?= $value['jumlah'] ?></p>
                                        <p class="text-sm text-muted"><i class="fa fa-calculator"></i> Rp.<?= $this->cart->format_number($value['harga']) ?></p>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>

                            <?php } ?>
                            <!-- cart end -->
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <div class="media-body">
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="right"><strong>Total :</strong></td>
                                            <td class="right">Rp.<?php
                                                                    $total = $this->db->select_sum('harga')->get_where('tb_filepesanan', ['status' => 0, 'id_user' => $this->session->userdata('id_user')])->result_array();
                                                                    $harga = $total[0]['harga'];
                                                                    echo number_format($harga); ?></td>
                                        </tr>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('belanja/cetak') ?>" class="dropdown-item dropdown-footer">Lihat</a>
                                <a href="<?= base_url('belanja/checkoutfile') ?>" class="dropdown-item dropdown-footer">Check Out</a>
                            <?php } ?>
                </div>
            </li>

            <!-- Login -->
            <li class="nav-item">
                <?php if ($this->session->userdata('email') == "") { ?>
                    <a style="border-radius: 5px;" href="<?= base_url('auth') ?>" class="nav-link bg-info " type="submit">Login <i class="fa fa-fw fa-sign-in "></i></a>
                <?php } else { ?>
            <li class="nav-item dropdown">
                <a class="naav-item" data-toggle="dropdown" href="#">
                    <img height="40" width="40" class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>"></img>
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $tb_user['name']; ?></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right">

                    <a class="dropdown-item" href="<?= base_url('pelanggan'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Akun Saya
                    </a>
                    <a class="dropdown-item" href="<?= base_url('pesanansaya') ?>">
                        <i class="fas fa-file-invoice fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pesanan Saya
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('yakin untuk logout?')">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        <?php } ?>
        </li>
        </ul>
    </div>
</nav>