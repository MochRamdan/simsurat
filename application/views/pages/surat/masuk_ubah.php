<h1><?php echo $judul; ?></h1><hr>
<?php echo form_open_multipart('surat/ubah_masuk', array('class' => 'form-horizontal')); ?>
<!--<form action="<?php //echo base_url().'index.php/surat/do_upload'; ?>" method="post" class="form-horizontal">-->
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
			<h4 class="widget-title">Form Surat Masuk</h4>
		</div>
    <div class="widget-body">
  		<div class="widget-main">
        <div class="row">
          <div class="col-md-6">
            <input type='hidden' id='id' name="id" value="<?php echo $surat[0]->ID_SURAT; ?>" />
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='no'>Nomor Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='no' name="no" placeholder='Nomor Surat' class='form-control'
                  value="<?php echo $surat[0]->NOMOR; ?>" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl'>Tanggal Surat</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl" name="tgl" type="text"
                    data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y', strtotime($surat[0]->TANGGAL)); ?>" />
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='hal'>Perihal</label>
              <div class='col-sm-8'>
                <input type='text' id='hal' name="hal" placeholder='Perihal' class='form-control'
                  value="<?php echo $surat[0]->PERIHAL; ?>" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='dari'>Dari</label>
              <div class='col-sm-8'>
                <input type='text' id='dari' name="dari" placeholder='Dari' class='form-control'
                  value="<?php echo $surat[0]->DARI; ?>" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kepada'>Kepada</label>
              <div class='col-sm-8'>
                <input type='text' id='kepada' name="kepada" placeholder='Kepada' class='form-control'
                  value="<?php echo $surat[0]->KEPADA; ?>" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='asal'>Asal Instansi</label>
              <div class='col-sm-8'>
                <input type='text' id='asal' name="asal" placeholder='Asal Instansi' class='form-control'
                  value="<?php echo $surat[0]->ASAL_INSTANSI; ?>" required="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl_masuk'>Tanggal Masuk Surat</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl_masuk" name="tgl_masuk" type="text"
                  data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y', strtotime($surat[0]->TANGGAL_MASUK)); ?>" />
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='surat'>Unggah Surat</label>
              <div class='col-sm-8'>
                <input type='file' multiple="" id='surat' name="surat[]" class='form-control' />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='jenis'>Jenis Surat</label>
              <div class='col-sm-8'>
                <select id='jenis' name="jenis" class='form-control form-control' required="">
                  <option></option>
                  <?php foreach ($jenis as $j) { ?>
                    <option <?php if($surat[0]->ID_JENIS == $j->ID_JENIS){ echo 'selected="selected"'; } ?> value="<?php echo $j->ID_JENIS ?>"><?php echo $j->NAMA?> </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='ket'>Keterangan</label>
              <div class='col-sm-8'>
                <textarea id='ket' name="ket" placeholder='Keterangan' class='form-control' rows="9"><?php echo $surat[0]->KETERANGAN; ?></textarea>
              </div>
            </div>
            <div class="form-group">
  						<div class="col-md-offset-4 col-md-8">
                <?php echo anchor("surat/masuk_list", "Kembali"); ?>
                <!--<a href="javascript:history.go(-1);">Kembali</a>-->
  							<button class="btn btn-info pull-right" type="submit">
  								<i class="ace-icon fa fa-check bigger-110"></i>
  								Simpan
  							</button>
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
          echo "<li>".$url_segment[6]." <br>
            <a href='".$u->PATH."' target='_blank'>[Lihat]</a>
            <a href='".base_url()."index.php/surat/hapus_upload/".$u->ID_UPLOAD."/".$u->ID_SURAT."'
              class='red' onclick='return confirm(\"Anda yakin?\")'>[Hapus]</a></li>";
          $idx++;
        }
        ?>
      </ol>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#jenis').change(function(event) {
    var tgl_masuk = $('#tgl_masuk').val();
    var jenis = $(this).val();
    // ambil masa aktif surat
    $.ajax({
      url: '<?php echo base_url()."index.php/surat/jadwal_inaktif/"; ?>' + jenis + "/" + tgl_masuk,
      type: 'GET',
      success: function(result) {
        $('#inaktif').val(result);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
    // ambil masa retensi surat
    $.ajax({
      url: '<?php echo base_url()."index.php/surat/jadwal_retensi/"; ?>' + jenis  + "/" + tgl_masuk,
      type: 'GET',
      success: function(result) {
        $('#retensi').val(result);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
});
</script>
