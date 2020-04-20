<h1><?php echo $judul; ?></h1><hr>
<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<div class="col-md-12">
  <div class="clearfix">
    <div class="pull-right tableTools-container"></div>
  </div>
  <div class="table-header">
    Daftar Arsip Surat
  </div>
  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nomor Surat</th>
        <th>Dari</th>
        <th>Prihal</th>
        <?php if($this->session->userdata('role') == 3){?>
          <th>Keterangan</th>
          <th>Status</th>
        <?php }else{ ?>
          <th>Tanggal Surat</th>
        <?php } ?>
        <th>Status Disposisi</th>
        <th>Lihat Arsip</th>
        <?php if($this->session->userdata('role') == 2) { ?>
          <th>Opsi</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody id="tabel-data">
      <?php $no = 1; foreach ($surat as $s) { ?>
        <tr>
          <td style="width: 5%;text-align: right;"><?php echo $no; ?>.</td>
          <td><?php echo $s->NOMOR; ?></td>
          <td><?php echo $s->DARI; ?></td>
          <td><?php echo $s->PERIHAL; ?></td>
          <!-- kondisi untuk pengguna -->
          <?php if($this->session->userdata('role') == 3){?>
            <td><?php echo $s->KETERANGAN_DISPOSISI; ?></td>

            <td><?php echo $s->STATUS_BACA == 1? "Sudah" : "Belum" ; ?></td>

            <td style="text-align: center;width: 10%;">
              <div class="hidden-sm hidden-xs action-buttons">
                <a class="btn-xs btn-primary" href="<?php echo base_url('Disposisi/status_terima/'.$s->ID)?>">Terima Surat</i>
                </a>
              </div>
            </td>

          <?php }else{ ?>
            <!-- kondisi status untuk pimpinan -->
            <td><?php echo date("d-m-Y", strtotime($s->TANGGAL)); ?></td>

            <?php if ($s->STATUS == 0) {
              echo "<td>"."Belum"."</td>";
            }else{
              echo "<td>"."Sudah"."</td>";
            } ?>

          <?php } ?>

          <td style="text-align: center;width: 10%;">
            <div class="hidden-sm hidden-xs action-buttons">
              <a class="green" target="_blank" href="<?php echo $s->PATH; ?>">
                <i class="ace-icon fa fa-folder-open-o bigger-130"></i>
              </a>
            </div>
          </td>

          <?php if($this->session->userdata('role') == 2) { ?>
            <td style="text-align: center;width: 10%;">
              <div class="hidden-sm hidden-xs action-buttons">
                <a class="btn-xs btn-primary" href="<?php echo base_url('Disposisi/get_disposisi/'.$s->ID)?>">Disposisi</i>
                </a>
              </div>
            </td>
          <?php } ?>

        </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#sudah").attr('checked', 'true');
    $("#belum").attr('checked', 'true');
    var sudah = $("#sudah").val();
    var belum = $("#belum").val();
  });
</script>
