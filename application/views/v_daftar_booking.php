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
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">daftar booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">sudah bayar</a>
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
                            <th>Atas Nama</th>
                            <th>Tanggal</th>
                            <th>Jam</th>

                            <th>Banyak Orang</th>
                            <th>No Meja</th>
                            <th>lokasi</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($daftar_booking as $key => $value) { ?>
                            <tr>
                                <td><?= $value->atas_nama; ?></td>
                                <td><?= $value->tgl_booking; ?></td>
                                <td><?= $value->jam; ?></td>
                                <td><?= $value->banyak_orang; ?></td>
                                <td><?= $value->no_meja; ?></td>
                                <td><?= $value->lokasi; ?></td>
                                <td>
                                    <span class="badge badge-warning">menunggu verifikasi</span>
                                </td>
                                <td>
                                    <a href="<?= base_url('daftar_booking/proses/' . $value->id_booking) ?>" class="btn btn-sm btn-sm btn-primary">verifikasi</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </table>
                </div>
                <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                    <!-- /.data pesanan dikonfirmasi, bayar -->
                    <table class="table">
                        <tr>
                            <th>Atas Nama</th>
                            <th>Tanggal</th>
                            <th>jam</th>
                            <th>Banyak Orang</th>
                            <th>No Meja</th>
                            <th>lokasi</th>
                            <th>DP_booking</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($booking_diproses as $key => $value) { ?>
                            <tr>
                                <td><?= $value->atas_nama; ?></td>
                                <td><?= $value->tgl_booking; ?></td>
                                <td><?= $value->jam; ?></td>

                                <td><?= $value->banyak_orang; ?></td>
                                <td><?= $value->no_meja; ?></td>
                                <td><?= $value->lokasi; ?></td>
                                <td>

                                    <b>Rp. <?= $value->dp_booking; ?></b><br>
                                    <span class="badge badge-success">sudah bayar</span><br>
                                    <span class="badge badge-primary">menunggu verifikasi</span>
                                </td>
                                <td>
                                    <?php if ($value->status_bayar == 1) { ?>
                                        <button class="btn btn-sm btn-success btn-sm" data-toggle="modal" data-target="#cek<?= $value->id_booking ?>">Cek Bukti Bayar</button>
                                        <a href="<?= base_url('daftar_booking/selesai/' . $value->id_booking) ?>" class="btn btn-sm btn-sm btn-primary">booking diterima</a>
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
                            <th>Jam</th>
                            <th>Banyak Orang</th>
                            <th>No Meja</th>
                            <th>lokasi</th>
                            <th>DP booking</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($booking_selesai as $key => $value) { ?>
                            <tr>
                                <td><?= $value->atas_nama; ?></td>
                                <td><?= $value->tgl_booking; ?></td>
                                <td><?= $value->jam; ?></td>
                                <td><?= $value->banyak_orang; ?></td>
                                <td><?= $value->no_meja; ?></td>
                                <td><?= $value->lokasi; ?></td>
                                <td>
                                    <!-- <?php $value->dp_booking = $value->banyak_orang * 20000 ?> -->
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

<!-- /.cek bukti pembayaran -->
<?php foreach ($booking_diproses as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_booking ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->atas_nama ?></h4>
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
                            <td><?= $value->atas_nama_bayar; ?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <?php $value->dp_booking = $value->banyak_orang * 20000 ?>
                            <td>Rp. <?= number_format($value->dp_booking, 0); ?></td>
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