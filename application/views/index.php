<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta charset="utf-8" />
  <title>E-Surat :: <?php echo $judul; ?></title>

  <meta name="description" content="overview &amp; stats" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

  <!-- bootstrap & fontawesome -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>" />
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/font-awesome/4.2.0/css/font-awesome.min.css'; ?>" />

  <!-- page specific plugin styles -->

  <!-- text fonts -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/fonts/fonts.googleapis.com.css'; ?>" />

  <!-- ace styles -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/ace.min.css'; ?>" class="ace-main-stylesheet" id="main-ace-style" />

  <!-- page specific plugin styles -->
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.custom.min.css'; ?>" />
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/chosen.min.css'; ?>" />
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/datepicker.min.css'; ?>" />
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap-timepicker.min.css'; ?>" />
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/daterangepicker.min.css'; ?>" />
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap-datetimepicker.min.css'; ?>" />
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/colorpicker.min.css'; ?>" />

  <!-- ace settings handler -->
  <script src="<?php echo base_url() . 'assets/js/ace-extra.min.js'; ?>"></script>

  <!--[if !IE]> -->
  <script src="<?php echo base_url() . 'assets/js/jquery.2.1.1.min.js'; ?>"></script>

  <!--[if !IE]> -->
  <script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo base_url() . "assets/js/jquery.min.js"; ?>'>" + "<" + "/script>");
  </script>
  <!-- <![endif]-->
</head>

<body class="no-skin">
  <div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
      try {
        ace.settings.check('navbar', 'fixed')
      } catch (e) {}
    </script>
    <div class="navbar-container" id="navbar-container">
      <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
        <span class="sr-only">Toggle sidebar</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <div class="navbar-header pull-left">
        <a href="index.php" class="navbar-brand">
          <small>
            <i class="fa fa-envelope"></i>
            Aplikasi Administrasi Surat Masuk dan Keluar
          </small>
        </a>
      </div>

      <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
          <li class="blue">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="ace-icon fa fa-bell"></i>
              <span class="badge badge-important"><?= $count_disposisi; ?></span>
            </a>

            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
              <li class="dropdown-header">
                <i class="ace-icon fa fa-bell"></i>
                Pemberitahuan
              </li>

              <li class="dropdown-content">
                <ul class="dropdown-menu dropdown-navbar">
                  <li>
                    <a href="#">
                      <div class="clearfix">
                        <span class="pull-left"><?= $count_disposisi . " " . $message; ?></span>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="blue">
            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
              <img class="nav-user-photo" src="<?php echo base_url() . 'assets/avatars/avatar2.png'; ?>" alt="User's Photo" />
              <span class="user-info">
                <small>Hai,</small>
                <?php echo $this->session->userdata('nama'); ?>
              </span>

              <i class="ace-icon fa fa-caret-down"></i>
            </a>
            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
              <li><a href="#"><i class="ace-icon fa fa-gear"></i>Ubah Password</a></li>
              <li class="divider"></li>
              <li><a href="<?php echo base_url() . 'index.php/login/keluar'; ?>"><i class="ace-icon fa fa-power-off"></i>Keluar</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div><!-- /.navbar-container -->
  </div>

  <div class="main-container" id="main-container">
    <script type="text/javascript">
      try {
        ace.settings.check('main-container', 'fixed')
      } catch (e) {}
    </script>
    <div id="sidebar" class="sidebar responsive">
      <script type="text/javascript">
        try {
          ace.settings.check('sidebar', 'fixed')
        } catch (e) {}
      </script>
      <?php $this->load->view('sidebar'); ?>
      <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
      </div>

      <script type="text/javascript">
        try {
          ace.settings.check('sidebar', 'collapsed')
        } catch (e) {}
      </script>
    </div>

    <div class="main-content">
      <div class="main-content-inner container">
        <?php $this->load->view($konten); ?>
      </div>
    </div>

    <div class="footer">
      <div class="footer-inner">
        <div class="footer-content">
          <span class="bigger-120">
            <span class="blue bolder">KPKNL</span>
            Bandung &copy; 2015
          </span>
        </div>
      </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
  </div>

  <!-- basic scripts -->

  <!--[if IE]>
	<script type="text/javascript">
	window.jQuery || document.write("<script src='<? //php echo base_url()."assets/js/jquery1x.min.js"; 
                                                ?>'>"+"<"+"/script>");
	</script>
	<![endif]-->
  <script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url() . "assets/js/jquery.mobile.custom.min.js"; ?>'>" + "<" + "/script>");
  </script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>

  <!-- page specific plugin scripts -->

  <!--[if lte IE 8]>
	  <script src="assets/js/excanvas.min.js"></script>
	<![endif]-->
  <script src="<?php echo base_url() . 'assets/js/jquery-ui.custom.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.ui.touch-punch.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.easypiechart.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.sparkline.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.flot.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.flot.pie.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.flot.resize.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/chosen.jquery.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/fuelux.spinner.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap-datepicker.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap-timepicker.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/moment.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/daterangepicker.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap-datetimepicker.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap-colorpicker.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.knob.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.autosize.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.inputlimiter.1.3.1.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.maskedinput.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap-tag.min.js'; ?>"></script>

  <!-- jquery dataTable -->
  <script src="<?php echo base_url() . 'assets/js/jquery.dataTables.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.dataTables.bootstrap.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/dataTables.tableTools.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/dataTables.colVis.min.js'; ?>"></script>

  <!-- ace scripts -->
  <script src="<?php echo base_url() . 'assets/js/ace-elements.min.js'; ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/ace.min.js'; ?>"></script>
  
  <!-- jQuery print.js -->
  <script src="<?= base_url('assets/js/jQuery.print.js') ?>"></script>
  <!-- setting library untuk DataTables -->
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      //initiate dataTables plugin
      var oTable1 = $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable({
          bAutoWidth: false,
          "language": {
            "lengthMenu": "Menampilkan _MENU_ data per halaman",
            "zeroRecords": "Maaf, tidak ada data yang bisa ditampilkan.",
            "info": "Halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data yang tersedia",
            "search": "Cari:",
            "decimal": ",",
            "thousands": ".",
            "paginate": {
              "previous": "<",
              "next": ">",
              "first": "<<",
              "last": ">>"
            },
            "infoFiltered": "(Penyaringan dari _MAX_ total data)"
          }
        });
      //oTable1.fnAdjustColumnSizing();

      // date-picker plugin
      $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function() {
          $(this).prev().focus();
        });

      //tombol tampilkan
      $('#tombol-show').click(function(e){
        e.preventDefault();

        var j_laporan = $('#laporan').val();
        var tgl1 = $('#tgl_1').val();
        var tgl2 = $('#tgl_2').val();

        alert(j_laporan);

        var url = "<?= base_url('Laporan/filter') ?>";

        $.ajax({
          url: url,
          method: 'post',
          data: { j_laporan: j_laporan, tgl1: tgl1, tgl2: tgl2 },
          dataType: 'json',
          async: false,
          success: function(respon){
            console.log(respon);
            var html = '';

            if (respon.length === 0) {
              alert("Data Tidak Ditemukan");
            }

            $.each(respon, function(i, v){
              // console.log(v.username);
              html += '<tr>' +
                '<td>' + v.NOMOR + '</td>' +
                '<td>' + v.PERIHAL + '</td>' +
                '<td>' + v.DARI + '</td>' +
                '<td>' + v.KEPADA + '</td>' +
                '<td>' + v.TANGGAL_MASUK + '</td>' +
                '<td>' + v.KATEGORI_SURAT + '</td>' +
                '</tr>';
            });
            $('#show_data').html(html);
          },
          error: function(){
            alert('Could not get data');
          }
        })
      });

      //print
      $("#print").click(function(e){
        e.preventDefault();
        $.print("#dynamic-table");
      })

    });
  </script>
</body>

</html>