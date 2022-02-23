<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Booking Appointment</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php echo form_open_multipart('booking_tempat/add') ?>
            <div class="card-body">
                <?php
                //notifikasi form kosong
                echo validation_errors('<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i>', '</h5></div>');
                ?>
                <div class="col-sm-12 row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <label for="exampleInputEmail1">Lokasi A</label>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/a/slider10.gif">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/a/slider20.gif">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/a/slider30.gif">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/a/slider4.gif">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-2"></div>

                    <div class="col-sm-8">
                        <label for="exampleInputEmail1">Lokasi Matoa</label>
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                            <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="0" class=""></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="1" class=""></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/matoa/slider1.gif">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/matoa/slider2.gif">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/matoa/slider3.gif">
                                    </div>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="col-sm-12 row">
                    <div class="col-sm-2"></div>

                    <div class="col-sm-8">
                        <label>Lokasi C</label>
                        <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                            <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators3" data-slide-to="0" class=""></li>
                                    <li data-target="#carouselExampleIndicators3" data-slide-to="1" class=""></li>
                                    <li data-target="#carouselExampleIndicators3" data-slide-to="2" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active mt-4">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/c/slider1.gif">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/c/slider2.gif">
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/c/slider3.gif">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br><br>

                <div class="col-sm-12 row">

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Pilih Lokasi</label>
                            <select name="lokasi" class="form-control">
                                <option value="lokasi_a">Lokasi A</option>
                                <option value="lokasi_matoa">Lokasi Matoa</option>
                                <option value="lokasi_c">Lokasi C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputemail1">Tanggal</label>
                            <input type="date" placeholder="waktu booking" name="tgl_booking" class="form-control" onkeyup="Waktumasuk();" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputemail1">jam</label>
                            <input type="time" placeholder="waktu booking" max="21:00" min="10:00" name="jam" class="form-control" required>
                            <!-- <input type="time" name="jam" placeholder="hrs:mins" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs time" required> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputemail1">Banyak Orang</label>
                            <input type="number" min="5" max="100" placeholder="banyak orang" name="banyak_orang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Pilih Meja (1 meja = 4 orang)</label><br>
                            <div class="card-footer">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="no_meja[]" value="1"> 1</label>
                                    <label> <input type="checkbox" name="no_meja[]" value="2"> 2</label>
                                    <label> <input type="checkbox" name="no_meja[]" value="3"> 3</label>
                                    <label> <input type="checkbox" name="no_meja[]" value="4"> 4</label>
                                    <label> <input type="checkbox" name="no_meja[]" value="5"> 5</label>
                                </div>
                                <div>
                                    <label><input type="checkbox" name="no_meja[]" value="6"> 6 </label>
                                    <label><input type="checkbox" name="no_meja[]" value="7"> 7 </label>
                                    <label><input type="checkbox" name="no_meja[]" value="8"> 8 </label>
                                    <label><input type="checkbox" name="no_meja[]" value="9"> 9 </label>
                                    <label><input type="checkbox" name="no_meja[]" value="10"> 10 </label>
                                </div>
                                <div>
                                    <label><input type="checkbox" name="no_meja[]" value="11"> 11</label>
                                    <label><input type="checkbox" name="no_meja[]" value="12"> 12</label>
                                    <label><input type="checkbox" name="no_meja[]" value="13"> 13</label>
                                    <label><input type="checkbox" name="no_meja[]" value="14"> 14</label>
                                    <label><input type="checkbox" name="no_meja[]" value="15"> 15</label>
                                </div>
                                <div>
                                    <label><input type="checkbox" name="no_meja[]" value="16"> 16</label>
                                    <label><input type="checkbox" name="no_meja[]" value="17"> 17</label>
                                    <label><input type="checkbox" name="no_meja[]" value="18"> 18</label>
                                    <label><input type="checkbox" name="no_meja[]" value="19"> 19</label>
                                    <label><input type="checkbox" name="no_meja[]" value="20"> 20</label>
                                </div>
                            </div>


                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Atas Nama</label>
                            <input class="form-control" name="atas_nama" placeholder="Atas Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No HP</label>
                            <input class="form-control" name="no_hp" placeholder="nomor hp" required>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url('booking_tempat') ?>" class="btn btn-success">back</a>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-6">
                        <label class="align-items">Tempat yang tidak tersedia(telah dibooking)</label>
                        <table class="table table-hover table-dark" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>jam</th>
                                    <th>No Meja</th>
                                    <th>lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($belum_bayar as $key => $value) {

                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value->tgl_booking; ?></td>
                                        <td><?= $value->jam; ?></td>
                                        <td><?= $value->no_meja; ?></td>
                                        <td><?= $value->lokasi; ?></td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
            <!-- /.card-body -->


            <?php echo form_close() ?>
        </div>

    </div>
</div>