<?php
/**
 *
 */
class Disposisi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->m_security->check();
    $data["judul"] = "Disposisi Arsip";
    $data["konten"] = "pages/surat/disposisi_list";

    if ($this->session->userdata('role') == 3) {
      $nip = $this->session->userdata('nip');

      $data["surat"] = $this->m_disposisi->get_by_nip($nip);
    }else{
      $data["surat"] = $this->m_disposisi->get_unprocessed();
    }

    // echo "<pre>";
    // print_r($data);
    // die();

    return $this->load->view("index", $data);
  }

  public function get_disposisi($id){
    $this->m_security->check();
    $data["judul"] = "Form Disposisi";
    $data["konten"] = "pages/surat/disposisi";

    $data["disposisi"] = $this->m_disposisi->get_disposisi($id);
    $data["pegawai"] = $this->m_pegawai->get_all();

    return $this->load->view("index", $data);
  }

  function update_disposisi(){
    $this->m_security->check();

    //get session id pengguna
    $id_pengguna = $this->session->userdata('id_pengguna');

    //get data from view
    $id_disposisi = $this->input->post('id_disposisi');
    $id_surat = $this->input->post('id_surat');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $kepada = $this->input->post('kepada');
    $dari = $id_pengguna;
    $keterangan = $this->input->post('ket');
    $status = true;

    $data = array(
      'ID_SURAT' => $id_surat,
      'ID_PENGGUNA' => $id_pengguna,
      'NIP_TUJUAN' => $kepada,
      'TANGGAL' => $tanggal,
      'STATUS' => $status,
      'KETERANGAN_DISPOSISI' => $keterangan
    );

    $query = $this->m_disposisi->update($id_disposisi, $data);
    // if ($query > 0) {

    // }
    redirect('Disposisi');
  }

  function status_terima($id){
    $this->m_security->check();

    $status_terima = true;
    $query = $this->m_disposisi->update_terima($id, $status_terima);

    redirect('Disposisi');
  }

  public function riwayat()
  {
    $this->m_security->check();
    $data["judul"] = "Riwayat Disposisi";
    $data["konten"] = "pages/surat/disposisi_riwayat";

    // $data["surat"] = $this->m_disposisi->get_unprocessed($this->session->userdata("nip"));
    $data["surat"] = $this->m_disposisi->get_unprocessed();

    return $this->load->view("index", $data);
  }

  public function cari_riwayat()
  {
    $this->m_security->check();
    $surat = $this->input->post("surat");

    $data["surat"] = $this->m_disposisi->get_where(array("disposisi.id" => $surat));

    return $this->load->view("pages/surat/disposisi_cari", $data);
  }

  public function bag_umum($id)
  {
    $this->m_security->check();
    $data['judul'] = "Disposisi Surat Sub Bagian Umum";
    $data['konten'] = "pages/surat/disposisi_umum";

    $data['surat'] = $this->m_arsip_masuk->get_id($id);
    $data['unit'] = $this->m_unit->get_all();

    return $this->load->view("index", $data);
  }

  public function unit_kerja($id)
  {
    $this->m_security->check();
    $data['judul'] = "Disposisi Surat Unit Kerja";
    $data['konten'] = "pages/surat/disposisi_unit";

    $data['surat'] = $this->m_arsip_masuk->get_id($id);
    $data['unit'] = $this->m_unit->get_all();

    return $this->load->view("index", $data);
  }
}

?>
