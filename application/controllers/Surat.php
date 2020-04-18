<?php

/**
 *
 */
class Surat extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function masuk()
  {
    $this->m_security->check();
    // $kategori = "masuk";

    $data['judul'] = "Surat Masuk";
    $data['konten'] = "pages/surat/masuk";

    $data['jenis'] = $this->m_jenis->get_all();

    return $this->load->view('index', $data);
  }

  public function masuk_list()
  {
    $this->m_security->check();
    $data['judul'] = "Lihat Arsip Masuk";
    $data['konten'] = "pages/surat/masuk_list";

    $data['surat'] = $this->m_arsip_masuk->get_custom(array("kategori_surat" => "masuk"));

    return $this->load->view('index', $data);
  }

  public function masuk_detil($id)
  {
    $this->m_security->check();
    $data['judul'] = "Detil Arsip Masuk";
    $data['konten'] = "pages/surat/masuk_detil";
    $data['jenis'] = $this->m_jenis->get_all();
    $data['surat'] = $this->m_surat->get_id($id);
    $data['upload'] = $this->m_upload->get_surat($id);

    return $this->load->view('index', $data);
  }

  public function masuk_ubah($id)
  {
    $this->m_security->check();
    $data['judul'] = "Ubah Arsip Masuk";
    $data['konten'] = "pages/surat/masuk_ubah";

    $data['jenis'] = $this->m_jenis->get_all();
    $data['surat'] = $this->m_surat->get_id($id);
    $data['upload'] = $this->m_upload->get_surat($id);

    return $this->load->view('index', $data);
  }

  public function masuk_hapus($id)
  {
    $this->m_security->check();
    // delete file from directory
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $upload = $this->m_upload->get_surat($id);
    foreach ($upload as $u) {
      $url_segment = explode("/", $u->PATH);
      $max_idx = sizeof($url_segment);
      $url = $document_root . "/"
        . $url_segment[$max_idx - 3] . "/"
        . $url_segment[$max_idx - 2] . "/"
        . $url_segment[$max_idx - 1] . "/"
        . $url_segment[$max_idx];
      unlink($url);
    }

    $this->m_arsip_masuk->delete_surat($id);
    $this->m_upload->delete_surat($id);
    $this->m_surat->delete($id);

    redirect('surat/masuk_list');
  }

  // surat keluar
  public function keluar()
  {
    $this->m_security->check();
    $data['judul'] = "Surat Keluar";
    $data['konten'] = "pages/surat/keluar";

    $data['jenis'] = $this->m_jenis->get_all();

    return $this->load->view('index', $data);
  }

  public function keluar_list()
  {
    $this->m_security->check();
    $data['judul'] = "Lihat Arsip Keluar";
    $data['konten'] = "pages/surat/keluar_list";

     $data['surat'] = $this->m_arsip_masuk->get_custom(array("kategori_surat" => "keluar"));

    return $this->load->view('index', $data);
  }

  public function keluar_detil($id)
  {
    $this->m_security->check();
    $data['judul'] = "Detil Arsip Keluar";
    $data['konten'] = "pages/surat/keluar_detil";

    $data['jenis'] = $this->m_jenis->get_all();
    $data['surat'] = $this->m_surat->get_id($id);
    $data['upload'] = $this->m_upload->get_surat($id);

    return $this->load->view('index', $data);
  }

  public function keluar_ubah($id)
  {
    $this->m_security->check();
    $data['judul'] = "Ubah Arsip Keluar";
    $data['konten'] = "pages/surat/keluar_ubah";

    $data['jenis'] = $this->m_jenis->get_all();
    $data['surat'] = $this->m_surat->get_id($id);
    $data['upload'] = $this->m_upload->get_surat($id);

    return $this->load->view('index', $data);
  }

  public function keluar_hapus($id)
  {
    $this->m_security->check();
    // delete file from directory
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $upload = $this->m_upload->get_surat($id);
    foreach ($upload as $u) {
      $url_segment = explode("/", $u->PATH);
      $max_idx = sizeof($url_segment);
      $url = $document_root . "/"
        . $url_segment[$max_idx - 3] . "/"
        . $url_segment[$max_idx - 2] . "/"
        . $url_segment[$max_idx - 1] . "/"
        . $url_segment[$max_idx];
      unlink($url);
    }

    $this->m_arsip_keluar->delete_surat($id);
    $this->m_upload->delete_surat($id);
    $this->m_surat->delete($id);

    redirect('surat/keluar_list');
  }

  public function jadwal_inaktif($jenis = null, $tgl_masuk = null)
  {
    if (!empty($jenis) && !empty($tgl_masuk)) {
      $inaktif = $this->m_inaktif->get_jenis($jenis);
      if (count($inaktif) > 0) {
        $masa_aktif = $inaktif[0]->MASA_AKTIF;
        $tahun = date("Y", strtotime($tgl_masuk)) + $masa_aktif;
        echo date("d-m", strtotime($tgl_masuk)) . "-" . $tahun;
      }
    } else {
      echo "";
    }
  }

  public function jadwal_retensi($jenis = null, $tgl_masuk = null)
  {
    if (!empty($jenis) && !empty($tgl_masuk)) {
      $retensi = $this->m_retensi->get_jenis($jenis);
      $inaktif = $this->m_inaktif->get_jenis($jenis);
      if (count($retensi) > 0 && count($inaktif) > 0) {
        $masa_aktif = $inaktif[0]->MASA_AKTIF;
        $masa_retensi = $retensi[0]->MASA_RETENSI + $masa_aktif;
        $tahun = date("Y", strtotime($tgl_masuk)) + $masa_retensi;
        echo date("d-m", strtotime($tgl_masuk)) . "-" . $tahun;
      }
    } else {
      echo "";
    }
  }

  public function simpan_masuk()
  {
    //cek session
    $this->m_security->check();

    $id_jenis = $this->input->post('jenis');
    $nomor = $this->input->post('no');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $perihal = $this->input->post('hal');
    $dari = $this->input->post('dari');
    $kepada = $this->input->post('kepada');
    $asal_instansi = $this->input->post('asal');
    $tanggal_masuk = date("Y-m-d", strtotime($this->input->post('tgl_masuk')));
    $keterangan = $this->input->post('ket');
    $kategori = "masuk";

    $data = array(
      'id_jenis' => $id_jenis,
      'nomor' => $nomor,
      'tanggal' => $tanggal,
      'perihal' => $perihal,
      'dari' => $dari,
      'kepada' => $kepada,
      'asal_instansi' => $asal_instansi,
      'tanggal_masuk' => $tanggal_masuk,
      'keterangan' => $keterangan,
      'kategori_surat' => $kategori
    );

    // input into surat master table --> surat
    $last_id = $this->m_surat->create('surat', $data);

    if ($last_id > 0) {
      //insert to disposisi
      $status = 0;
      $this->m_disposisi->create($last_id, $status);

      // start upload file surat
      $this->load->library('upload');
      $config['upload_path'] = './uploads/surat/';
      $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xsl|xslx';
      //$config['overwrite'] = TRUE;
      $config['max_size'] = 0;
      $this->upload->initialize($config);

      if ($this->upload->do_multi_upload('surat')) {
        $uploaded_files = $this->upload->get_multi_upload_data();
        foreach ($uploaded_files as $meta => $file) {
          $path = base_url() . 'uploads/surat/' . $file['file_name'];
          $this->m_upload->create($last_id, $path);
        }
      }
    }

    // end upload file surat
    redirect('/surat/masuk');
  }

  public function ubah_masuk()
  {
    $this->m_security->check();
    // get values from input control
    $id_surat = $this->input->post('id');
    $id_jenis = $this->input->post('jenis');
    $nomor = $this->input->post('no');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $perihal = $this->input->post('hal');
    $dari = $this->input->post('dari');
    $kepada = $this->input->post('kepada');
    $asal_instansi = $this->input->post('asal');
    $tanggal_masuk = date("Y-m-d", strtotime($this->input->post('tgl_masuk')));
    $keterangan = $this->input->post('ket');

    // update surat master table --> surat
    $query = $this->m_surat->update(
      $id_surat,
      $id_jenis,
      $nomor,
      $tanggal,
      $perihal,
      $dari,
      $kepada,
      $asal_instansi,
      $tanggal_masuk,
      $keterangan
    );

    if ($query > 0) {
      // start upload file surat
      $this->load->library('upload');
      $config['upload_path'] = './uploads/surat/';
      $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xsl|xslx';
      //$config['overwrite'] = FALSE;
      $config['max_size'] = 0;
      $this->upload->initialize($config);

      if ($this->upload->do_multi_upload('surat')) {
        $uploaded_files = $this->upload->get_multi_upload_data();
        foreach ($uploaded_files as $meta => $file) {
          $path = base_url() . 'uploads/surat/' . $file['file_name'];
          $this->m_upload->create($id_surat, $path);
        }
      }
      // end upload file surat
    }
    redirect('/surat/masuk_list');
  }

  public function hapus_upload($id_upload, $id_surat, $jenis = "masuk")
  {
    $this->m_security->check();
    // delete file from directory
    $document_root = $_SERVER['DOCUMENT_ROOT'];
    $upload = $this->m_upload->get_id($id_upload);
    foreach ($upload as $u) {
      $url_segment = explode("/", $u->PATH);
      $max_idx = sizeof($url_segment);
      $url = $document_root . "/"
        . $url_segment[$max_idx - 3] . "/"
        . $url_segment[$max_idx - 2] . "/"
        . $url_segment[$max_idx - 1] . "/"
        . $url_segment[$max_idx];
      unlink($url);
    }

    // delete record from database
    $this->m_upload->delete($id_upload);

    if ($jenis == "masuk") {
      redirect("/surat/masuk_ubah/" . $id_surat);
    } else {
      redirect("/surat/keluar_ubah/" . $id_surat);
    }
  }

  public function simpan_keluar()
  {
    $this->m_security->check();
    
    $id_jenis = $this->input->post('jenis');
    $nomor = $this->input->post('no');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $perihal = $this->input->post('hal');
    $dari = $this->input->post('dari');
    $kepada = $this->input->post('kepada');
    $asal_instansi = $this->input->post('asal');
    $tanggal_kirim = date("Y-m-d", strtotime($this->input->post('tgl_kirim')));
    $keterangan = $this->input->post('ket');
    $kategori = "keluar";

    $data = array(
      'id_jenis' => $id_jenis,
      'nomor' => $nomor,
      'tanggal' => $tanggal,
      'perihal' => $perihal,
      'dari' => $dari,
      'kepada' => $kepada,
      'asal_instansi' => $asal_instansi,
      'tanggal_masuk' => $tanggal_kirim,
      'keterangan' => $keterangan,
      'kategori_surat' => $kategori
    );

    // input into surat master table --> surat
    $last_id = $this->m_surat->create('surat', $data);

    if($last_id > 0){
      // start upload file surat
      $this->load->library('upload');
      $config['upload_path'] = './uploads/surat/';
      $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xsl|xslx';
      //$config['overwrite'] = TRUE;
      $config['max_size'] = 0;
      $this->upload->initialize($config);

      if ($this->upload->do_multi_upload('surat')) {
        $uploaded_files = $this->upload->get_multi_upload_data();
        foreach ($uploaded_files as $meta => $file) {
          $path = base_url() . 'uploads/surat/' . $file['file_name'];
          $this->m_upload->create($last_id, $path);
        }
      }
    }

    redirect('/surat/keluar');
  }

  public function ubah_keluar()
  {
    $this->m_security->check();
    // get values from input control
    $id_surat = $this->input->post('id');
    $id_jenis = $this->input->post('jenis');
    $nomor = $this->input->post('no');
    $tanggal = date("Y-m-d", strtotime($this->input->post('tgl')));
    $perihal = $this->input->post('hal');
    $dari = $this->input->post('dari');
    $kepada = $this->input->post('kepada');
    $asal_instansi = $this->input->post('asal');
    $tanggal_kirim = date("Y-m-d", strtotime($this->input->post('tgl_kirim')));
    $keterangan = $this->input->post('ket');

    // update surat master table --> surat
    $query = $this->m_surat->update(
      $id_surat,
      $id_jenis,
      $nomor,
      $tanggal,
      $perihal,
      $dari,
      $kepada,
      $asal_instansi,
      $tanggal_kirim,
      $keterangan
    );

    if ($query > 0) {
      // start upload file surat
      $this->load->library('upload');
      $config['upload_path'] = './uploads/surat/';
      $config['allowed_types'] = 'jpg|png|pdf|doc|docx|xsl|xslx';
      //$config['overwrite'] = FALSE;
      $config['max_size'] = 0;
      $this->upload->initialize($config);

      if ($this->upload->do_multi_upload('surat')) {
        $uploaded_files = $this->upload->get_multi_upload_data();
        foreach ($uploaded_files as $meta => $file) {
          $path = base_url() . 'uploads/surat/' . $file['file_name'];
          $this->m_upload->create($id_surat, $path);
        }
      }
      // end upload file surat
    }

    redirect('/surat/keluar_list');
  }
}
