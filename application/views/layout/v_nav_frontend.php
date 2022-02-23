  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-black">
      <div class="container">
          <a href="<?= base_url() ?>" class="navbar-brand">
              <img src="<?= base_url('assets/logo/logodama.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
              <span class="brand-text font-weight-light">Dama Cafe</span>
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a href="<?= base_url() ?>" class="nav-link">Home</a>
                  </li>
                  <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
                  <li class="nav-item dropdown">
                      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori </a>
                      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                          <?php foreach ($kategori as $key => $value) { ?>
                              <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori; ?></a></li>
                          <?php } ?>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('pesanan_saya') ?>" class="nav-link">Pesanan Saya</a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('booking_tempat') ?>" class="nav-link">Bookingan Tempat</a>
                  </li>
                  <!-- <li class="nav-item dropdown">
                      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                          <li><a href="#" class="dropdown-item">Some action </a></li>
                          <li><a href="#" class="dropdown-item">Some other action</a></li>

                          <li class="dropdown-divider"></li>

                         
               
              </ul>
              </li> -->
              </ul>

          </div>

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
              <!-- Messages Dropdown Menu -->
              <li class="nav-item">
                  <?php if ($this->session->userdata('email') == "") { ?>
                      <a class="nav-link" href="<?= base_url('pelanggan/login') ?>">
                          <span class="brand-text font-weight-light">Login/Register</span>
                          <i class="far fa-user "></i>
                          <!-- <img src="<?= base_url() ?>template/dist/img/user1-128x128.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                      </a>
                  <?php } else { ?>
                      <a class="nav-link" data-toggle="dropdown" href="0">
                          <span class="brand-text font-weight-light"><?= $this->session->userdata('nama_pelanggan'); ?></span>
                          <i class="far fa-user "></i>
                      </a>

                      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                          <div class="dropdown-divider"></div>

                          <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item">
                              <i class="fas fa-shopping-cart mr-2"></i> Pesanan saya
                          </a>
                          <div class="dropdown-divider"></div>
                          <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Log Out</a>
                      </div>
                  <?php } ?>
              </li>
              <?php
                $keranjang = $this->cart->contents();
                $jml_item = 0;
                foreach ($keranjang as $key => $value) {
                    $jml_item = $jml_item + $value['qty'];
                }
                ?>
              <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="fas fa-shopping-cart"></i>
                      <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <?php
                        if (empty($keranjang)) { ?>
                          <a class="dropdown-item">
                              <p>keranjang anda kosong</p>
                          </a>
                          <?php } else {
                            foreach ($keranjang as $key => $value) {
                                $menu = $this->m_home->detail_menu($value['id']);
                            ?>
                              <!-- Barang start -->
                              <a href="#" class="dropdown-item">
                                  <!-- Message Start -->
                                  <div class="media">
                                      <img src="<?= base_url('assets/gambar/' . $menu->gambar) ?>" alt="User Avatar" class="img-size-50 mr-3">
                                      <div class="media-body">
                                          <h3 class="dropdown-item-title">
                                              <?= $value['name']; ?>
                                          </h3>
                                          <p class="text-sm"><?= $value['qty']; ?>x Rp. <?= number_format($value['price'], 0); ?></p>
                                          <p class="text-sm text-muted">
                                              Total : Rp. <?= $this->cart->format_number($value['subtotal']); ?>
                                          </p>
                                      </div>
                                  </div>
                                  <!-- Message End -->
                              </a>
                              <div class="dropdown-divider"></div>
                          <?php } ?>
                          <!-- Barang End -->
                          <a href="#" class="dropdown-item">
                              <div class="media">
                                  <div class="media-body">
                                      <tr>
                                          <td colspan="2"></td>
                                          <td class="right"><strong>Total :</strong></td>
                                          <td class="right">Rp. <?= $this->cart->format_number($this->cart->total()); ?></td>
                                      </tr>

                                  </div>
                              </div>
                          </a>
                          <div class="dropdown-divider"></div>
                          <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer">view cart</a>
                          <a href="<?= base_url('belanja/cekout') ?>" class="dropdown-item dropdown-footer">check out</a>
                      <?php  } ?>

                  </div>
              </li>

          </ul>
      </div>
  </nav>
  <!-- /.navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0"><?= $title ?></h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Menu Online</a></li>
                          <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
          <div class="container">