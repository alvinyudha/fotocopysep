<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <h1 class="h3 mb-4 text-gray-800"><?= $tittle; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <img src="<?= base_url('assets/img/profile/') . $tb_user['image']; ?>">
        <div class="card-body">
            <h5 class="card-tittle"><?= $tb_user['name']; ?></h5>
            <p class="card-text"><?= $tb_user['email']; ?></p>
            <p class="card-text">Since <?= date('d F Y', $tb_user['date_created']); ?></p>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->