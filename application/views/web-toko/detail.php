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
        <div class="container card card-solid px-4 px-lg-5  align-items-stretch ">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"><?= $barang['nama_barang'] ?></h3>
                        <div class="col-12">
                            <img src="<?= base_url('/assets/barang/') . $barang['gambar_barang']  ?>" class="img-fluid" alt="Product Image">
                        </div>
                        <!-- <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                </div> -->
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3 d-none d-sm-block"><?= $barang['nama_barang'] ?></h3>
                        <hr>
                        <h5><?= $barang['merk'] ?></h5>
                        <p>
                            <?= $barang['deskripsi'] ?>
                        </p>
                        <hr>
                        <br>
                        <div class="badge bg-success py-2 px-3  text-white">
                            <h2 class="mb-0">
                                Rp. <?= number_format($barang['harga_barang']) ?>.00
                            </h2>
                        </div>

                        <?php
                        echo form_open('belanja/add');
                        echo form_hidden('id', $barang['id_barang']);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $barang['harga_barang']);
                        echo form_hidden('name', $barang['nama_barang']);
                        echo form_hidden('redirect_page', str_replace('website.php', '', current_url()));
                        ?>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-sm-2">
                                    <input type="number" name="qty" class="form-control" value="1" min="1">
                                </div>
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-primary swalDefaultSuccess" style="border-radius: 10px;">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                        <!-- <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div> -->

                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>