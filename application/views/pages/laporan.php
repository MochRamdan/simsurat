<h1><?php echo $judul; ?></h1>
<div class="col-md-12">
  <div class="widget-box">
    <div class="widget-header widget-header-flat">
      <h4 class="widget-title smaller">Filter</h4>
    </div>
    <div class="widget-body">
      <div class="widget-main">
        <form method="post" action="<?//php echo base_url() . 'Laporan/filter'; ?>" class="form-horizontal" role="form" target="_blank">
          <div class='form-group'>
            <label class='col-sm-1 control-label no-padding-right' for='laporan'>Laporan</label>
            <div class='col-sm-4'>
              <select class="form-control" id="laporan" name="laporan" required="">
                <option></option>
                <option value="1">Surat Masuk</option>
                <option value="2">Surat Keluar</option>
                <!-- <option value="3">Disposisi</option> -->
              </select>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-1 control-label no-padding-right' for='tgl_1'>Mulai</label>
            <div class='col-sm-3'>
              <div class="input-group">
                <input class="form-control date-picker" id="tgl_1" name="tgl_1" type="text" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y"); ?>" required="" />
                <span class="input-group-addon">
                  <i class="fa fa-calendar bigger-110"></i>
                </span>
              </div>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-1 control-label no-padding-right' for='tgl_2'>Sampai</label>
            <div class='col-sm-3'>
              <div class="input-group">
                <input class="form-control date-picker" id="tgl_2" name="tgl_2" type="text" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-Y"); ?>" required="" />
                <span class="input-group-addon">
                  <i class="fa fa-calendar bigger-110"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-1 col-md-11">
              <button class="btn btn-info" id="tombol-show">
                <i class="ace-icon fa fa-file bigger-110"></i>
                Tampilkan
              </button>
              &nbsp; &nbsp; &nbsp;
              <button class="btn btn-success" id="print">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Cetak
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>Nomor Surat</th>
          <th>Perihal</th>
          <th>Dari</th>
          <th>Kepada</th>
          <th>Tanggal Masuk</th>
          <th>Kategori Surat</th>
        </tr>
      </thead>
      <tbody id="show_data">

      </tbody>
    </table>

  </div>
</div>