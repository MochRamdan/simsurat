<h1><?php echo $judul; ?></h1><hr>
<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<?php echo form_open_multipart('Disposisi/update_disposisi', array('class' => 'form-horizontal')); ?>
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
			<h4 class="widget-title">Form Disposisi Surat</h4>
		</div>
    <div class="widget-body">
  		<div class="widget-main">
        <div class="row">
          <div class="col-md-6">
            <input type='hidden' id='id_disposisi' name="id_disposisi" value="<?= $disposisi[0]->ID; ?>" />
            <input type='hidden' id='id_surat' name="id_surat" value="<?= $disposisi[0]->ID_SURAT; ?>" />
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='no'>Nomor Surat</label>
              <div class='col-sm-8'>
                <input type='text' id='no' name="no" value="<?= $disposisi[0]->NOMOR; ?>" placeholder='Nomor Surat' class='form-control' required="" readonly="" />
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='tgl'>Tanggal Disposisi</label>
              <div class='col-sm-5'>
                <div class="input-group">
    							<input class="form-control date-picker" id="tgl" name="tgl" type="text"
                  data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>" readonly=""/>
    							<span class="input-group-addon">
    								<i class="fa fa-calendar bigger-110"></i>
    							</span>
    						</div>
              </div>
            </div>
            <!-- <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='hal'>Perihal</label>
              <div class='col-sm-8'>
                <input type='text' id='hal' name="hal" placeholder='Perihal' class='form-control' required="" />
              </div>
            </div> -->
            <!-- <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='dari'>Dari</label>
              <div class='col-sm-8'>
                <input type='text' id='dari' name="dari" placeholder='Dari' class='form-control' required="" />
              </div>
            </div> -->
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='kepada'>Kepada</label>
              <div class='col-sm-8'>
                <select id='kepada' name="kepada" class='form-control form-control' required="">
                  <option>Pilih</option>
                  <?php foreach ($pegawai as $p) { ?>
                    <option value="<?= $p->NIP; ?>"><?php echo $p->NAMA?> </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class='col-sm-4 control-label no-padding-right' for='ket'>Keterangan</label>
              <div class='col-sm-8'>
                <textarea id='ket' name="ket" placeholder='Keterangan' class='form-control' rows="9"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-4 col-md-8">
                <a href="<?php echo base_url().'Disposisi'; ?>">Kembali</a>
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
