    <?php
    if ($this->session->flashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>';
        echo $this->session->flashdata('pesan');
        echo '</div>';
    }
    ?>

    <div class="col-12 col-sm-12">
        <div class="card card-dark card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">pesanan masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">diProses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">selesai</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <!-- /.data order -->
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Atas Nama</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($pesanan as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td><?= $value->nama_pelanggan; ?></td>
                                    <?php if ($value->metode_bayar == 'transfer_bank') {
                                    ?>
                                        <td>
                                            <b>Rp. <?= $value->total_bayar; ?></b><br>
                                            <?php if ($value->status_bayar == 0) { ?>
                                                <span class="badge badge-warning">belum bayar</span>
                                            <?php } else { ?>
                                                <span class="badge badge-success">sudah bayar</span><br>
                                                <span class="badge badge-primary">menunggu verifikasi</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($value->status_bayar == 1) { ?>
                                                <button class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
                                                <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-sm btn-primary">proses</a>
                                            <?php } ?>
                                        </td>
                                    <?php } else {
                                    ?>
                                        <td>
                                            <b>Rp. <?= $value->total_bayar; ?></b><br>
                                            <span class="badge badge-success">cash</span><br>
                                            <span class="badge badge-warning">belum bayar</span>
                                        </td>
                                        <?php $value->status_bayar == 1  ?>
                                        <td>
                                            <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-sm btn-primary">verifikasi sudah bayar</a>
                                        </td>
                                    <?php } ?>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <!-- /.data pesanan diproses -->
                        <table class="table">
                            <tr>
                                <th>Nooo Order</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($pesanan_diproses as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td>
                                        <b>Rp. <?= $value->total_bayar; ?></b><br>

                                        <span class="badge badge-primary">Diproses</span>
                                    </td>
                                    <td>
                                        <?php if ($value->status_bayar == 1) { ?>
                                            <a href="<?= base_url('admin/selesai/' . $value->id_transaksi) ?>" class="btn btn-sm btn-sm btn-primary">selesai</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <!-- /.data pesanan selesai -->
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                            <?php foreach ($pesanan_selesai as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td>
                                        <b>Rp. <?= $value->total_bayar; ?></b><br>

                                    </td>
                                    <td>
                                        <?php if ($value->status_bayar == 2) { ?>
                                            <a href="<?= base_url('admin/selesai/' . $value->id_transaksi) ?>" class="btn btn-sm btn-sm btn-primary">selesai</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>


            </div>
            <!-- /.card -->
        </div>
    </div>

    <!-- /.cek bukti pembayaran -->
    <?php foreach ($pesanan as $key => $value) { ?>
        <div class="modal fade" id="cek<?= $value->id_transaksi ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?= $value->no_order ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <th>Nama Bank</th>
                                <th>:</th>
                                <td><?= $value->nama_bank; ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Rekening</th>
                                <th>:</th>
                                <td><?= $value->no_rek; ?></td>
                            </tr>
                            <tr>
                                <th>Atas Nama</th>
                                <th>:</th>
                                <td><?= $value->atas_nama; ?></td>
                            </tr>
                            <tr>
                                <th>Total Bayar</th>
                                <th>:</th>
                                <td>Rp. <?= number_format($value->total_bayar, 0); ?></td>
                            </tr>
                            <img src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" class="img-fluid pad" alt="">
                        </table>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>