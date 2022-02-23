                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/slider1.gif">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/slider2.gif">
                            </div>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?= base_url() ?>/assets/slider/slider3.gif">
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
                    <!--tampilan menu-->
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="row">
                                <?php foreach ($menu as $key => $value) { ?>
                                    <div class="col-sm-4">
                                        <?php
                                        echo form_open('belanja/add');
                                        echo form_hidden('id', $value->id_menu);
                                        echo form_hidden('qty', 1);
                                        echo form_hidden('price', $value->harga);
                                        echo form_hidden('name', $value->nama_menu);
                                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));

                                        ?>
                                        <!-- <div class="card bg-light d-flex flex-fill"> -->
                                        <!-- <div class="card-header text-muted border-bottom-0">
                                            Digital Strategist
                                        </div> -->
                                        <!-- <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="#" class="btn btn-sm bg-teal">
                                                    <i class="fas fa-comments"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-user"></i> View Profile
                                                </a>
                                            </div>
                                        </div> -->
                                        <!-- <div class="card card-solid"> -->
                                        <!-- <div class="card-body pb-0 "> -->
                                        <!-- <div class="row "> -->
                                        <div class="card card-dark card-outline">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $value->nama_menu ?></h5>
                                                <br>
                                                <label><?= $value->nama_kategori ?></label>

                                                <p class="col-12 text-center">
                                                    <img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" height="250px" width="250px">
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="text-left">
                                                            <h4><span class="badge bg-dark">Rp. <?= number_format($value->harga, 0) ?></span></h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="text-right">
                                                            <a href="<?= base_url('home/detail_menu/' . $value->id_menu) ?>" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                                            <button type="submit" class="btn btn-sm btn-success swalDefaultSuccess"><i class="fas fa-cart-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close(); ?>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <!-- </div> -->
                                        <!-- </div> -->
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- SweetAlert2 -->
                    <script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
                    <script>
                        $(function() {
                            var Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            $('.swalDefaultSuccess').click(function() {
                                Toast.fire({
                                    icon: 'success',
                                    title: 'item berhasil ditambahkan ke pesanan'
                                })
                            });
                        });
                    </script>