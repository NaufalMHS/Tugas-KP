<?php
defined('BASEPATH') or exit('No direct script access allowed');

class surat_keluar extends CI_Model
{
  public function semuadata()
  {
    $this->db->select("
      surat_keluar.*,
      jabatan.nama_jabatan,
      jabatan.singkatan_jabatan,
      perihal.perihal_surat,
      perihal.singkatan_perihal
    ");
    $this->db->join("jabatan", "surat_keluar.jenis_surat_keluar = jabatan.singkatan_jabatan", "left");
    $this->db->join("perihal", "surat_keluar.perihal_surat_keluar = perihal.singkatan_perihal", "left");
    $this->db->where('status', 'Y');
    return $this->db->get('surat_keluar')->result_array();
  }
  public function filter_tanggal($startdate, $enddate)
  {
    // $this->db->where('tanggal_surat_masuk >= ', $startdate);
    // $this->db->where('status', 'Y' and 'tanggal_surat_keluar BETWEEN "' . $startdate . '" AND "' . $enddate . '"');
    $query = $this->db->query("SELECT* from surat_keluar where status='Y' and tanggal_surat_keluar BETWEEN '$startdate' and '$enddate' ");
    return $query->result_array();
    // return $this->db->get('surat_keluar')->result_array();
  }
  public function Approve()
  {
    $this->db->select("
      surat_keluar.*,
      jabatan.nama_jabatan,
      jabatan.singkatan_jabatan,
      perihal.perihal_surat,
      perihal.singkatan_perihal
    ");
    $this->db->join("jabatan", "surat_keluar.jenis_surat_keluar = jabatan.singkatan_jabatan", "left");
    $this->db->join("perihal", "surat_keluar.perihal_surat_keluar = perihal.singkatan_perihal", "left");
    $this->db->where('approve', 'menunggu');
    $this->db->where('status', 'Y');
    return $this->db->get('surat_keluar')->result_array();
  }

  public function setuju($id)
  {
    $result = $this->db->where('nomor_surat_keluar', $id)->get('surat_keluar');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
    $data = [
      "setuju" => $this->input->post('approve')
    ];
    $this->db->update('surat_keluar', $data);
  }
  public function tolak()
  {
    $data = [
      "tolak" => $this->input->post('approve')
    ];
    $this->db->update('surat_keluar', $data);
  }

  public function proses()
  {
    $data = [
      "tanggal_surat_keluar"  => $this->input->post('tanggal_surat_keluar'),
      "jenis_surat_keluar"  => $this->input->post('jenis_surat_keluar'),
      "perihal_surat_keluar"  => $this->input->post('perihal_surat_keluar'),
      "tujuan_surat_keluar"  => $this->input->post('tujuan_surat_keluar'),
      "upload_surat_keluar"  => $this->input->post('upload_surat_keluar'),
      "nomor_surat_keluar"  => $this->input->post('nomor_surat_keluar'),

    ];

    $this->db->insert('surat_keluar', $data);
  }
  public function respon($id)
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
  public function getperihal()
  {
    $query = $this->db->query("SELECT * FROM perihal ORDER BY id_perihal ASC");
    return $query->result();
  }
  public function nomorsuratkeluar($id)
  {
    $result = $this->db->where('nomor_surat_keluar', $id)->get('surat_keluar');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }

  public function detailsuratkeluar($id)
  {
    $this->db->select("
surat_keluar.*,
jabatan.nama_jabatan,
jabatan.singkatan_jabatan,
perihal.perihal_surat,
perihal.singkatan_perihal
");
    $this->db->join("jabatan", "surat_keluar.jenis_surat_keluar = jabatan.singkatan_jabatan", "left");
    $this->db->join("perihal", "surat_keluar.perihal_surat_keluar = perihal.singkatan_perihal", "left");
    $result = $this->db->where('id_surat_keluar', $id)->get('surat_keluar');
    if ($result->num_rows() > 0) {
      return $result->result();
    } else {
      return false;
    }
  }


  public function hitungsuratkeluar()
  {
    $this->db->where('status', 'Y');
    $query = $this->db->get('surat_keluar');

    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  public function hitungsuratkeluarpending()
  {
    $this->db->where('status', 'Y');
    $this->db->where('approve', 'menunggu');

    $query = $this->db->get('surat_keluar');

    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  public function hitungsuratkeluarupload()
  {
    $this->db->where('status', 'Y');
    $this->db->where('is_upload', '0');

    $query = $this->db->get('surat_keluar');

    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }
  function hitungsuratbulan1($tahun)
  {

    $query = $this->db->query("SELECT* from surat_keluar where YEAR(tanggal_surat_keluar) =  '$tahun'
and MONTH(tanggal_surat_keluar) = date('1') ORDER by tanggal_surat_keluar ASC ");
    if ($query->num_rows() > 0) {
      return $query->num_rows();
    } else {
      return 0;
    }
  }

  function hitungbytahun()
  {
    $this->db->where('status', 'Y');
    $query = $this->db->query("SELECT YEAR(tanggal_surat_keluar) AS tahun FROM surat_keluar GROUP BY
YEAR(tanggal_surat_keluar) ORDER BY YEAR(tanggal_surat_keluar) ASC");
    return $query->result();
  }
  function hitungtanggal($tanggalawal, $tanggalakhir)
  {
    $query = $this->db->query("SELECT* from surat_keluar where status='Y' and tanggal_surat_keluar BETWEEN '$tanggalawal'
and '$tanggalakhir' ORDER by tanggal_surat_keluar ASC");
    return $query->result();
  }
  function hitungbulan($tahun1, $bulanawal, $bulanakhir)
  {
    $query = $this->db->query("SELECT* from surat_keluar where status='Y' and YEAR(tanggal_surat_keluar)='$tahun1' and
MONTH(tanggal_surat_keluar) BETWEEN '$bulanawal' and '$bulanakhir' ORDER by tanggal_surat_keluar ASC");
    return $query->result();
  }
  function hitungtahun($tahun2)
  {
    $query = $this->db->query("SELECT* from surat_keluar where status='Y' and YEAR(tanggal_surat_keluar)='$tahun2' ORDER by
tanggal_surat_keluar ASC");
    return $query->result();
  }
}