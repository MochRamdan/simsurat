<?php
/**
 *
 */
class M_Disposisi extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  // public function create($id, $nip, $surat, $kepada, $tanggal)
  // {
  //   return $this->db->insert(
  //     'disposisi',
  //     array(
  //       'id' => $id,
  //       'nip' => $nip,
  //       'id_surat' => $surat,
  //       'kepada' => $kepada,
  //       'tanggal' => $tanggal
  //     )
  //   );
  // }

  public function create($id_surat, $status, $status_baca)
  {
    return $this->db->insert(
      'disposisi',
      array(
        'id_surat' => $id_surat,
        'status' => $status,
        'status_baca' => $status_baca
      )
    );
  }

  public function update($id_disposisi, $data)
  {
    $this->db->where('id', $id_disposisi);
    return $this->db->update('disposisi', $data);
  }

  function update_terima($id, $status_terima){
    $this->db->where('id', $id);
    $data = array('status_baca' => $status_terima); 
    return $this->db->update('disposisi', $data);
  }

  function get_count_nip($where){
    $query = $this->db->get_where('disposisi', $where);
    return $query->num_rows();
  }

  function get_count($where){
    $query = $this->db->get_where('disposisi', $where);
    return $query->num_rows();
  }

  public function get_all()
  {
    return $this->db->get('disposisi')->result();
  }

  public function get_id($id)
  {
    return $this->db->get_where('disposisi', array('id' => $id))->result();
  }

  public function get_surat($surat)
  {
    return $this->db->get_where('disposisi', array('id_surat' => $surat))->result();
  }

  public function get_where(array $where = array())
  {
    $this->db->select("disposisi.ID, disposisi.NIP, disposisi.ID_SURAT, surat.DARI, surat.KEPADA,
    disposisi.TANGGAL AS TANGGAL_DISPOSISI, surat.JUDUL_KOP, surat.NOMOR, surat.TANGGAL AS TANGGAL_SURAT");
    $this->db->from("disposisi");
    $this->db->join("pegawai", "disposisi.nip = pegawai.nip");
    $this->db->join("surat", "disposisi.id_surat = surat.id_surat");
    $this->db->where($where);
    return $this->db->get()->result();
  }

  public function get_unprocessed()
  {
    $this->db->from('disposisi');
    $this->db->join('surat', 'surat.id_surat = disposisi.id_surat');
    $this->db->join('upload', 'upload.id_surat = surat.id_surat');
    $query = $this->db->get()->result();
    return $query;
  }

  function get_by_nip($nip){
    $this->db->from('disposisi');
    $this->db->join('surat', 'surat.id_surat = disposisi.id_surat');
    $this->db->join('upload', 'upload.id_surat = surat.id_surat');
    $query = $this->db->where('disposisi.nip_tujuan', $nip);
    return $query->get()->result();
  }

  public function get_disposisi($id){
    $this->db->from('surat');
    $this->db->join('disposisi', 'disposisi.id_surat = surat.id_surat');
    $this->db->join('upload', 'upload.id_surat = surat.id_surat');
    $query = $this->db->where('disposisi.id', $id);
    return $query->get()->result();
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('disposisi');
  }
}

?>
