<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jenis extends CI_Model
{
  public function semuadata()
  {
    return $this->db->get('jabatan')->result_array();
  }
  function getdata()
  {
    $query = $this->db->query("SELECT * FROM jabatan ORDER BY nama_jabatan ASC");
    return $query->result();
  }

  public function proses()
  {
    $data = [
      "nama_jabatan"  => $this->input->post('nama_jabatan'),
      "singkatan"  => $this->input->post('singkatan_jabatan'),

    ];

    $this->db->insert('surat_respon', $data);
  }
}