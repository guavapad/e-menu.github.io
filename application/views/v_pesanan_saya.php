<div class="row">
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
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">diProses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">selesai</a>
                    </li>

                </ul>
            </div>
            <div class="card-body col-12 col-sm-12">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <!-- /.data pesanan order -->
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Atas Nama</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($belum_bayar as $key => $value) { ?>
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
                                            <?php if ($value->status_bayar == 0) { ?>
                                                <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-sm btn-primary">bayar</a>
                                            <?php } ?>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <b>Rp. <?= $value->total_bayar; ?></b><br>
                                            <span class="badge badge-success">cash</span><br>
                                            <span class="badge badge-warning">belum bayar</span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('belanja/update_status/' . $value->id_transaksi) ?>" class="btn btn-sm btn-sm btn-primary"><i class="fas fa-cash-register"></i></a>
                                            <p>Tekan Tombol ini <br>dan silahkan bayar ke kasir</p>
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
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                            <?php foreach ($diproses as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td>
                                        <b>Rp. <?= $value->total_bayar; ?></b><br>


                                        <span class="badge badge-success">Terverifikasi</span><br>
                                        <span class="badge badge-primary">Pesanan diproses</span>

                                    </td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <table class="table">
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                            <?php foreach ($selesai as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order; ?></td>
                                    <td><?= $value->tgl_order; ?></td>
                                    <td>
                                        <b>Rp. <?= $value->total_bayar; ?></b><br>


                                        <span class="badge badge-primary">Pesanan Selesai</span>

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
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>