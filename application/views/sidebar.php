<ul class="nav nav-list">
  <li class="">
    <a href="<?php echo base_url(); ?>">
      <i class="menu-icon fa fa-home"></i>
      <span class="menu-text">Beranda</span>
    </a>
    <b class="arrow"></b>
  </li>

  <!-- menu master -->
  <?php if ($this->session->userdata('role') == 1) { ?>
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-check-square-o"></i>
        <span class="menu-text">
          Master
        </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="<?php echo base_url() . 'master/jabatan'; ?>">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Jabatan
            </span>
            <b class="arrow"></b>
          </a>
          <b class="arrow"></b>
        </li>
        <li class="">
          <a href="<?php echo base_url() . 'master/unit_kerja' ?>">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Unit Kerja
            </span>
            <b class="arrow"></b>
          </a>
          <b class="arrow"></b>
        </li>
        <li class="">
          <a href="<?php echo base_url() . 'master/pegawai'; ?>">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Pegawai
            </span>
            <b class="arrow"></b>
          </a>
          <b class="arrow"></b>
        </li>
        <li class="">
          <a href="<?php echo base_url() . 'master/jenis_surat'; ?>">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Jenis Surat
            </span>
            <b class="arrow"></b>
          </a>
          <b class="arrow"></b>
        </li>

      </ul>
    </li>
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-envelope"></i>
        <span class="menu-text">
          Arsip
        </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Surat Masuk
            </span>
            <b class="arrow fa fa-angle-down"></b>
          </a>
          <b class="arrow"></b>
          <ul class="submenu">
            <li class="">
              <a href="<?php echo base_url() . 'surat/masuk'; ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                <span class="menu-text">
                  Surat Masuk
                </span>
                <b class="arrow"></b>
              </a>
              <b class="arrow"></b>
            </li>

            <li class="">
              <a href="<?php echo base_url() . 'surat/masuk_list'; ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                <span class="menu-text">
                  Lihat Data Surat Masuk
                </span>
                <b class="arrow"></b>
              </a>
              <b class="arrow"></b>
            </li>
          </ul>
        </li>

        <li class="">
          <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Surat Keluar
            </span>
            <b class="arrow fa fa-angle-down"></b>
          </a>
          <b class="arrow"></b>
          <ul class="submenu">
            <li class="">
              <a href="<?php echo base_url() . 'surat/keluar'; ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                <span class="menu-text">
                  Surat Keluar
                </span>
                <b class="arrow"></b>
              </a>
              <b class="arrow"></b>
            </li>

            <li class="">
              <a href="<?php echo base_url() . 'surat/keluar_list'; ?>">
                <i class="menu-icon fa fa-caret-right"></i>
                <span class="menu-text">
                  Lihat Data Surat Keluar
                </span>
                <b class="arrow"></b>
              </a>
              <b class="arrow"></b>
            </li>
          </ul>
        </li>
      </ul>
    </li>
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-exchange"></i>
        <span class="menu-text">
          Disposisi
        </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="<?php echo base_url() . 'disposisi'; ?>">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Disposisi Arsip
            </span>
            <b class="arrow"></b>
          </a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>
    <li class="">
      <a href="<?php echo base_url() . 'index.php/laporan'; ?>">
        <i class="menu-icon glyphicon glyphicon-file"></i>
        <span class="menu-text">
          Laporan
        </span>
        <b class="arrow"></b>
      </a>
      <b class="arrow"></b>
    </li>

  <?php } ?>

  <?php if ($this->session->userdata('role') == 2) { ?>
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-exchange"></i>
        <span class="menu-text">
          Disposisi
        </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="<?php echo base_url() . 'disposisi'; ?>">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Disposisi Arsip
            </span>
            <b class="arrow"></b>
          </a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>
  <?php } ?>

  <?php if ($this->session->userdata('role') == 3) { ?>
    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-exchange"></i>
        <span class="menu-text">
          Disposisi
        </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="<?php echo base_url() . 'disposisi'; ?>">
            <i class="menu-icon fa fa-caret-right"></i>
            <span class="menu-text">
              Disposisi Arsip
            </span>
            <b class="arrow"></b>
          </a>
          <b class="arrow"></b>
        </li>
      </ul>
    </li>

  <?php } ?>

  <?php if ($this->session->userdata('role') == 1) { ?>
    <li class="">
      <a href="<?php echo base_url() . 'index.php/page/pengguna'; ?>">
        <i class="menu-icon fa fa-users"></i>
        <span class="menu-text">
          Atur Pengguna
        </span>
        <b class="arrow"></b>
      </a>
      <b class="arrow"></b>
    </li>
  <?php } ?>

</ul><!-- /.nav-list -->