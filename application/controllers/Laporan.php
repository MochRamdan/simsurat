<?php
/**
 *
 */
class Laporan extends CI_Controller
{

  public function index()
  {
    $data['judul'] = 'Laporan';
    $data['konten'] = 'pages/laporan';

    if ($this->session->userdata('role') == 3) {
      $nip = $this->session->userdata('nip');
      $status_baca = false;

      //get count disposisi
      $where = array(
        'NIP_TUJUAN' => $nip,
        'STATUS_BACA' => $status_baca 
      );

      $data["count_disposisi"] = $this->m_disposisi->get_count_nip($where);
      $data["message"] = "Surat Belum diterima";
    }else{
      //get count disposisi
      $status = false;
      $where = array(
        'STATUS' => $status
      );

      $data["count_disposisi"] = $this->m_disposisi->get_count($where);
      $data["message"] = "Surat Belum disposisi";
    }

    $this->load->view('index', $data);
  }

  public function template()
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Template';
    $data['pegawai'] = $this->m_pegawai->get_all();
    $html = $this->load->view('pages/pegawai', $data, true);

    $this->pdfgenerator->generate($html, 'coba_pdf');
  }

  public function filter()
  {
    $laporan = $this->input->post('j_laporan');
    $tgl1 = date("Y-m-d", strtotime($this->input->post('tgl1')));
    $tgl2 = date("Y-m-d", strtotime($this->input->post('tgl2')));

    switch ($laporan) {
      case 1: $this->surat_masuk($tgl1, $tgl2); break;
      case 2: $this->surat_keluar($tgl1, $tgl2); break;
      // case 3: $this->disposisi($tgl1, $tgl2); break;
    }
  }

  protected function surat_masuk($tgl1, $tgl2)
  {
    $kategori_surat = "masuk";

    //array
    $arr = array(
      'KATEGORI_SURAT' => $kategori_surat,
      'TANGGAL_MASUK >=' => $tgl1,
      'TANGGAL_MASUK <=' => $tgl2
    );
    $data = $this->m_surat->get_masuk_by_date($arr);

    //if $data kosong
    if (empty($data)) {
      $data = array();
    }else{
      $data = $data;
    }

    echo json_encode($data);
  }

  protected function surat_keluar($tgl1, $tgl2)
  {
    $kategori_surat = "keluar";

    //array
    $arr = array(
      'KATEGORI_SURAT' => $kategori_surat,
      'TANGGAL_MASUK >=' => $tgl1,
      'TANGGAL_MASUK <=' => $tgl2
    );

    $data = $this->m_surat->get_masuk_by_date($arr);

    //if $data kosong
    if (empty($data)) {
      $data = array();
    }else{
      $data = $data;
    }

    echo json_encode($data);
  }

  protected function disposisi($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Disposisi Arsip Surat';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_disposisi->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'disposisi_surat_'.date("d_m_Y"));
  }

  protected function peminjaman($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Peminjaman Arsip Surat';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_peminjaman->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'peminjaman_'.date("d_m_Y"));
  }

  protected function inaktif($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Peminjaman Arsip Surat';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_inaktif->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'peminjaman_'.date("d_m_Y"));
  }

  protected function retensi($tgl1, $tgl2)
  {
    $this->load->library('pdfgenerator');
    $data['judul'] = 'Laporan Retensi Arsip';
    $data['subjudul'] = 'Periode: '.date("d-m-Y", $tgl1).' s/d '.date("d-m-Y", $tgl2);
    $data['arsip'] = $this->m_retensi->get_all();
    $html = $this->load->view('report/pdf_template', $data, true);

    $this->pdfgenerator->generate($html, 'retensi_'.date("d_m_Y"));
  }
}
