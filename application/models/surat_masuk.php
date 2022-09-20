<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat_masuk extends CI_Model
{
  public function semuadata()
  {
    return $this->db->get('surat_masuk')->result_array();
  }
  public function filter_tanggal($startdate, $enddate)
  {
    // $this->db->where('tanggal_surat_masuk >= ', $startdate);
    $this->db->where('tanggal_surat_masuk BETWEEN "' . $startdate . '" AND "' . $enddate . '"');
    return $this->db->get('surat_masuk')->result_array();
  }

  public function proses()
  {
    $data = [
      "no_surat_masuk"  => $this->input->post('no_surat_masuk'),
      "jenis_surat_masuk"  => $this->input->post('jenis_surat_masuk'),
      "perihal_surat_masuk"  => $this->input->post('perihal_surat_masuk'),
      "tanggal_surat_masuk"  => $this->input->post('tanggal_surat_masuk'),
      "sifat_surat_masuk"  => $this->input->post('sifat_surat_masuk'),
      "asal_surat_masuk"  => $this->input->post('asal_surat_masuk'),
      "upload_surat_masuk"  => $this->input->post('file'),

    ];

    $this->db->insert('surat_masuk', $data);
  }
  public function detailsuratmasuk($id)
  {
    $result = $this->db->where('id_surat_masuk', $id)->get('surat_masuk');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }
  public function getdata()
  {
    $query = $this->db->query("SELECT * FROM jabatan ORDER BY id_jabatan ASC");
    return $query->result();
  }
  public function hitungsuratmasuk()
  {
    $query = $this->db->get('surat_masuk');
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  function hitungbytahun()
  {

    $query = $this->db->query("SELECT YEAR(tanggal_surat_masuk) AS tahun FROM surat_masuk GROUP BY YEAR(tanggal_surat_masuk) ORDER BY YEAR(tanggal_surat_masuk) ASC");
    return $query->result();
  }
  function hitungtanggal($tanggalawal, $tanggalakhir)
  {
    $query = $this->db->query("SELECT* from surat_masuk where  tanggal_surat_masuk BETWEEN '$tanggalawal' and '$tanggalakhir'  ORDER by tanggal_surat_masuk ASC");
    return $query->result();
  }
  function hitungbulan($tahun1, $bulanawal, $bulanakhir)
  {
    $query = $this->db->query("SELECT* from surat_masuk where  YEAR(tanggal_surat_masuk)='$tahun1' and MONTH(tanggal_surat_masuk) BETWEEN '$bulanawal' and '$bulanakhir'  ORDER by tanggal_surat_masuk ASC");
    return $query->result();
  }
  function hitungtahun($tahun2)
  {
    $query = $this->db->query("SELECT* from surat_masuk where  YEAR(tanggal_surat_masuk)='$tahun2'  ORDER by tanggal_surat_masuk ASC");
    return $query->result();
  }
}