<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Page extends CI_Controller
{
  function __construct()
    {
      parent::__construct();
    }

  public function index()
  {
    $this->m_peminjaman->cek_keterlambatan();
    $this->m_riwayat_inaktif->status_check();
    $this->m_riwayat_retensi->status_check();
    $this->m_security->check();
    $data['judul'] = 'Beranda';
    $data['konten'] = 'pages/beranda';

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

  public function master()
  {
    $this->m_security->check();
    $data['judul'] = 'Data Master';
    $data['konten'] = 'pages/master';
    $this->load->view('index', $data);
  }

  public function surat()
  {
    $this->m_security->check();
    $data['judul'] = 'Surat';
    $data['konten'] = 'pages/surat';
    $this->load->view('index', $data);
  }

  public function pengguna()
  {
    $this->m_security->check();
    $data['judul'] = 'Atur Pengguna';
    $data['konten'] = 'pages/pengguna';
    $data['pengguna'] = $this->m_pengguna->get_all();

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
}

?>
