<body class="hold-transition layout-top-nav">
    <!-- Header-->
    <!-- <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
            </div>
        </div>
    </header> -->

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
        <div class="container px-lg-5 mt-5 align-items-stretch">

            <!-- Page Heading -->

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Print</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url('layanan/print'); ?>">View Details</a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Cetak Foto</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url('website/cetakfoto'); ?>">View Details</a>

                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="container px-lg-5 mt-5 align-items-stretch">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach ($barang as $b) : ?>
                    <div class="col sm-5">
                        <?php
                        echo form_open('belanja/add');
                        echo form_hidden('id', $b['id_barang']);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $b['harga_barang']);
                        echo form_hidden('name', $b['nama_barang']);
                        echo form_hidden('redirect_page', str_replace('website.php', '', current_url()));
                        ?>
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <!-- <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                            </div> -->
                            <!-- Product image-->
                            <img src="<?= base_url('/assets/barang/') . $b['gambar_barang']; ?>" class="" height="240px">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $b['nama_barang'] ?></h5>
                                    <p class="text-muted text-sm"><b>Kategori : </b> <?= $b['nama_kategori'] ?></p>
                                    <h5>
                                        <span class="badge bg-success">
                                            Rp.<?= number_format($b['harga_barang']); ?>
                                        </span>
                                    </h5>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-3 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary swalDefaultSuccess">Add to Cart</button>
                                    <a class="btn btn-outline-dark" href="<?= base_url('website/detail/') . $b['id_barang'] ?>"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                <?php endforeach ?>
            </div>
        </div>