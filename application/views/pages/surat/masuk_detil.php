<h1><?php echo $judul; ?></h1>
<hr>
<form action="" method="post" class="form-horizontal">
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
      <h4 class="widget-title">Detil Surat Masuk</h4>
    </div>
    <div class="widget-body">
      <div class="widget-main">
        <div class="row">
          <div class="col-md-6">
            <input type='hidden' id='id' name="id" placeholder='ID Surat' class='form-control' required="" disabled="" value="<?php echo $surat[0]->ID_SURAT; ?>" />
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='no'>Nomor Surat</label>
              <label class='col-sm-4 control-label no-padding-right' for='no'><b><?php echo $surat[0]->NOMOR; ?></b></label>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl'>Tanggal Surat</label>
              <label class='col-sm-4 control-label no-padding-right' for='tgl'><b><?php echo date("d-m-Y", strtotime($surat[0]->TANGGAL)); ?></b></label>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='hal'>Perihal</label>
              <label class='col-sm-4 control-label no-padding-right' for='hal'><b><?php echo $surat[0]->PERIHAL; ?></b></label>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kepada'>Kepada</label>
              <label class='col-sm-4 control-label no-padding-right' for='kepada'><b><?php echo $surat[0]->KEPADA; ?></b></label>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='asal'>Asal Instansi</label>
              <label class='col-sm-4 control-label no-padding-right' for='asal'><b><?php echo $surat[0]->ASAL_INSTANSI; ?></b></label>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'>Tanggal Masuk Surat</label>
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'><b><?php echo date("d-m-Y", strtotime($surat[0]->TANGGAL_MASUK)); ?></b></label>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'>Jenis Surat</label>
              <?php foreach ($jenis as $j) {
                if($surat[0]->ID_JENIS == $j->ID_JENIS){
                  echo "<label class='col-sm-4 control-label no-padding-right'><b>".$j->NAMA."</b></label>";
                }
              } ?>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'>Keterangan</label>
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'><b><?php echo $surat[0]->KETERANGAN; ?></b></label>
            </div>
            <div class="form-group">
              <div class="col-md-offset-3">
                <?php echo anchor("surat/masuk_list", "Kembali"); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="widget-box">
  <div class="widget-header widget-header-flat">
    <h4 class="widget-title">Daftar Arsip Surat</h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <ol>
        <?php
        $idx = 1;
        foreach ($upload as $u) {
          $url_segment = explode("/", $u->PATH);
          echo "<li>" . $url_segment[6] . " <br>
            <a href='" . $u->PATH . "' target='_blank'>[Lihat]</a></li>";
          $idx++;
        }
        ?>
      </ol>
    </div>
  </div>
</div>