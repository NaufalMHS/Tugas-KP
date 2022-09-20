  <?php
  defined('BASEPATH') or exit('No direct script access allowed');

  class surat_respon extends CI_Model
  {
    public function semuadata()
    {
      $this->db->select("
    surat_respon.*,
    jabatan.nama_jabatan,
    jabatan.singkatan_jabatan,
    perihal.perihal_surat,
    perihal.singkatan_perihal,
    surat_masuk.id_surat_masuk,
    surat_masuk.no_surat_masuk
    ");
      $this->db->join("jabatan", "surat_respon.jenis_surat_respon = jabatan.singkatan_jabatan", "left");
      $this->db->join("perihal", "surat_respon.perihal_surat_respon = perihal.singkatan_perihal", "left");
      $this->db->join("surat_masuk", "surat_respon.nomor_surat_masuk = surat_masuk.id_surat_masuk", "left");
      return $this->db->get('surat_respon')->result_array();
    }
    public function filter_tanggal($startdate, $enddate)
    {
      // $this->db->where('tanggal_surat_masuk >= ', $startdate);
      $this->db->where('tanggal_surat_respon BETWEEN "' . $startdate . '" AND "' . $enddate . '"');
      return $this->db->get('surat_respon')->result_array();
    }
    public function Approve()
    {
      $this->db->select("
      surat_respon.*,
      jabatan.nama_jabatan,
      jabatan.singkatan_jabatan,
      perihal.perihal_surat,
      perihal.singkatan_perihal,
      surat_masuk.id_surat_masuk,
      surat_masuk.no_surat_masuk
    ");
      $this->db->join("jabatan", "surat_respon.jenis_surat_respon = jabatan.singkatan_jabatan", "left");
      $this->db->join("perihal", "surat_respon.perihal_surat_respon = perihal.singkatan_perihal", "left");
      $this->db->join("surat_masuk", "surat_respon.nomor_surat_masuk = surat_masuk.id_surat_masuk", "left");
      $this->db->where('approve', 'menunggu');
      return $this->db->get('surat_respon')->result_array();
    }
    public function proses()
    {
      $data = [
        "no_surat_respon"  => $this->input->post('no_surat_respon'),
        "jenis_surat_respon"  => $this->input->post('jenis_surat_respon'),
        "perihal_surat_respon"  => $this->input->post('perihal_surat_respon'),
        "tanggal_surat_respon"  => $this->input->post('tanggal_surat_respon'),
        "sifat_surat_respon"  => $this->input->post('sifat_surat_respon'),
        "asal_surat_respon"  => $this->input->post('asal_surat_respon'),
        "upload_surat_respon"  => $this->input->post('file'),

      ];

      $this->db->insert('surat_respon', $data);
    }
    public function detailnomorrespon($id)
    {
      $result = $this->db->where('id_surat_masuk', $id)->get('surat_masuk');
      if ($result->num_rows() > 0) {
        return $result->result();
      } else {
        return false;
      }
    }
    public function detailsuratrespon($id)
    {
      $this->db->select("
    surat_respon.*,
    jabatan.nama_jabatan,
    jabatan.singkatan_jabatan,
    perihal.perihal_surat,
    perihal.singkatan_perihal,
    surat_masuk.id_surat_masuk,
    surat_masuk.no_surat_masuk
    ");
      $this->db->join("jabatan", "surat_respon.jenis_surat_respon = jabatan.singkatan_jabatan", "left");
      $this->db->join("perihal", "surat_respon.perihal_surat_respon = perihal.singkatan_perihal", "left");
      $this->db->join("surat_masuk", "surat_respon.nomor_surat_masuk = surat_masuk.id_surat_masuk", "left");
      $result = $this->db->where('id_surat_respon', $id)->get('surat_respon');
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
    public function nomorsuratrespon($id)
    {
      $result = $this->db->where('nomor_surat_respon', $id)->get('surat_respon');
      if ($result->num_rows() > 0) {
        return $result->result();
      } else {
        return false;
      }
    }

    public function hitungsuratrespon()
    {
      $query = $this->db->get('surat_respon');
      if ($query->num_rows() > 0) {
        return $query->num_rows();
      } else {
        return 0;
      }
    }
    public function hitungsuratresponpending()
    {
      $this->db->where('approve', 'menunggu');
      $query = $this->db->get('surat_respon');
      if ($query->num_rows() > 0) {
        return $query->num_rows();
      } else {
        return 0;
      }
    }
    public function hitungsuratresponupload()
    {
      $this->db->where('is_respon', '0');
      $query = $this->db->get('surat_respon');
      if ($query->num_rows() > 0) {
        return $query->num_rows();
      } else {
        return 0;
      }
    }
    function hitungbytahun()
    {

      $query = $this->db->query("SELECT YEAR(tanggal_surat_respon) AS tahun FROM surat_respon GROUP BY YEAR(tanggal_surat_respon) ORDER BY YEAR(tanggal_surat_respon) ASC");
      return $query->result();
    }
    function hitungtanggal($tanggalawal, $tanggalakhir)
    {
      $query = $this->db->query("SELECT* from surat_respon where  tanggal_surat_respon BETWEEN '$tanggalawal' and '$tanggalakhir'  ORDER by tanggal_surat_respon ASC");
      return $query->result();
    }
    function hitungbulan($tahun1, $bulanawal, $bulanakhir)
    {
      $query = $this->db->query("SELECT* from surat_respon where  YEAR(tanggal_surat_respon)='$tahun1' and MONTH(tanggal_surat_respon) BETWEEN '$bulanawal' and '$bulanakhir'  ORDER by tanggal_surat_respon ASC");
      return $query->result();
    }
    function hitungtahun($tahun2)
    {
      $query = $this->db->query("SELECT* from surat_respon where  YEAR(tanggal_surat_respon)='$tahun2'  ORDER by tanggal_surat_respon ASC");
      return $query->result();
    }
  }