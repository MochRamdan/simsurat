<?php
/**
 *
 */
class M_Surat extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create($table, $data)
  {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }

  public function get_all()
  {
    $this->db->select("surat.*, lokasi.nama as LOKASI, jenis_surat.nama as JENIS");
    $this->db->from("surat");
    $this->db->join("lokasi", "surat.id_lokasi = lokasi.id_lokasi");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis");
    $this->db->join("media", "surat.id_media = media.id_media");
    return $this->db->get()->result();
  }

  public function get_id($id)
  {
    $this->db->from("surat");
    $this->db->join("jenis_surat", "surat.id_jenis = jenis_surat.id_jenis");
    $this->db->where('id_surat', $id);
    return $this->db->get()->result();
  }

  public function get_custom(array $condition = array())
  {
    return $this->db->get_where("surat", $condition)->result();
  }

  public function update($id, $jenis, $nomor, $tanggal, $perihal, $dari, $kepada, $asal_instansi, $tanggal_masuk, $keterangan)
  {
    $this->db->where('id_surat', $id);
    return $this->db->update(
      'surat',
      array(
        'id_jenis' => $jenis,
        'nomor' => $nomor,
        'tanggal' => $tanggal,
        'perihal' => $perihal,
        'dari' => $dari,
        'kepada' => $kepada,
        'asal_instansi' => $asal_instansi,
        'tanggal_masuk' => $tanggal_masuk,
        'keterangan' => $keterangan
      )
    );
  }

  public function delete($id)
  {
    $this->db->where('id_surat', $id);
    return $this->db->delete('surat');
  }
}
