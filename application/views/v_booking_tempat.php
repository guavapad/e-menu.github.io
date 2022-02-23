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
                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">selesai</a>
                    </li>

                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <!-- /.data pesanan order -->
                        <div class="card-tools">
                            <a href="<?= base_url('booking_tempat/add_booking') ?>" type="button" class="btn btn-primary btn-xs">
                                <i class="fas fa-plus"></i>
                                Add booking</a>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Atas Nama</th>
                                <th>Tanggal</th>
                                <th>jam</th>
                                <th>lokasi</th>
                                <th>status</th>
                            </tr>
                            <?php foreach ($booking_tempat as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->atas_nama; ?></td>
                                    <td><?= $value->tgl_booking; ?></td>
                                    <td><?= $value->jam; ?></td>

                                    <td><?= $value->lokasi; ?></td>
                                    <td>
                                        <span class="badge badge-warning">menunggu verifikasi</span>
                                    </td>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <!-- /.data pesanan diproses -->
                        <table class="table">
                            <tr>
                                <th>Atas Nama</th>
                                <th>Tanggal</th>
                                <th>jam</th>
                                <th>lokasi</th>
                                <th>DP booking</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($belum_bayar as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->atas_nama; ?></td>

                                    <td><?= $value->tgl_booking; ?></td>
                                    <td><?= $value->jam; ?></td>
                                    <td><?= $value->lokasi; ?></td>
                                    <td>
                                        <b>Rp. <?= $value->dp_booking; ?></b><br>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <span class="badge badge-warning">belum bayar</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">sudah bayar</span><br>
                                            <span class="badge badge-primary">menunggu verifikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <a href="<?= base_url('booking_tempat/bayar/' . $value->id_booking) ?>" class="btn btn-sm btn-sm btn-primary">bayar</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <table class="table">
                            <tr>
                                <th>Atas Nama</th>
                                <th>Tanggal</th>
                                <th>jam</th>
                                <th>lokasi</th>
                                <th>DP booking</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($booking_selesai as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->atas_nama; ?></td>
                                    <td><?= $value->tgl_booking; ?></td>
                                    <td><?= $value->jam; ?></td>
                                    <td><?= $value->lokasi; ?></td>
                                    <td>
                                        <b>Rp. <?= $value->dp_booking; ?></b><br>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">booking selesai</span>
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