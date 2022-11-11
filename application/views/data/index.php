<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Data Barang</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-danger stretched-link" href="<?= base_url('barang'); ?>">View Details</a>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Data Kategori</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-warning stretched-link" href="<?= base_url('kategori'); ?>">View Details</a>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Data Paket Foto</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-success stretched-link" href="<?= base_url('cetakfoto'); ?>">View Details</a>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Data File Pesanan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-primary stretched-link" href="<?= base_url('filepesanan') ?>">View Details</a>
                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->