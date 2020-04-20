<?php
/**
 *
 */
class m_security extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function check()
	{
		$nip=$this->session->userdata('nip');
		if(empty($nip))
		{
			$this->session->sess_destroy();
			redirect('/login');
		}
	}

  // public function gen_ai_id($tabel, $kategori)
  // {
  //   $this->db->where($tabel, $kategori);
  //   // $this->db->select_max($kolom, 'id');
  //   $data = $this->db->get($tabel);
  //   $count = $data->num_rows();
  //   return ($count + 1);
  //   // return ($data[0]->id + 1);
  // }
}

?>
