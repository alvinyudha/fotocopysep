<body class="hold-transition layout-top-nav">
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
        <div class="container px-lg-5 align-items-stretch justify-content-center">
            <div class="card card-solid">
                <div class="card-body pb-0 ">
                    <div class="row ">
                        <?php
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-check"></i>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }
                        ?>
                        <?php echo form_open('belanja/update'); ?>
                        <table class="table " cellpadding="6" cellspacing="1" style="width:100%">
                            <tr>
                                <th width="85px">QTY</th>
                                <th>Nama Barang</th>
                                <th class="text-align:right">Gambar</th>
                                <th class="text-align:right">Ukuran</th>
                                <th class="text-align:right">Sub-Total</th>
                                <th class="text-center">Action</th>
                            </tr>

                            <?php $i = 1; ?>

                            <?php
                            $barang = $this->db->get_where('tb_filepesanan', ['status' => 0, 'id_user' => $this->session->userdata('id_user')])->result_array();

                            foreach ($barang as $items) :
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $items['jumlah']; ?>
                                    </td>
                                    <td><?php echo $items['nama']; ?></td>
                                    <td class="text-align:right"> <img src="<?= base_url('/assets/barang/') . $items['nama']  ?>" class="img-size-50 "></td>
                                    <td class="text-align:right"><?php echo $items['ukuran']; ?></td>
                                    <td class="text-align:right">Rp. <?php echo number_format($items['harga']); ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('belanja/hapuscetak/') . $items['id']; ?>" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>

                                <?php $i++; ?>

                            <?php endforeach; ?>

                            <tr style="font-size: 20px;">
                                <td colspan="3"> </td>
                                <td class="right">
                                    <strong>Total :</strong>
                                </td>
                                <td class="right">
                                    <strong>Rp. <?php
                                                $total = $this->db->select_sum('harga')->get_where('tb_filepesanan', ['status' => 0, 'id_user' => $this->session->userdata('id_user')])->result_array();
                                                $harga = print_r($total[0]['harga']);
                                                number_format($harga); ?></strong>
                                </td>
                            </tr>

                        </table>

                        <a href="<?= base_url('belanja/checkoutfile') ?>" class="btn btn-success"> <i class="fa fa-fw fa-money-check-alt"></i> Check Out</a>
                        <br>
                        <br>
                        <?php form_close(); ?>
                    </div>
                </div>
            </div>
        </div>