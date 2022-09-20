<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

   public function index()
   {
      $tahun =  date('Y');
      $data['title'] = 'Dashboard';
      $data['hitung_keluar_bulan1'] = $this->surat_keluar->hitungsuratbulan1($tahun);
      $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
      $data['total_masuk'] = $this->surat_masuk->hitungsuratmasuk();
      $data['total_keluar'] = $this->surat_keluar->hitungsuratkeluar();
      $data['total_respon'] = $this->surat_respon->hitungsuratrespon();
      $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
      $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
      $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
      $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer',);
   }
   public function chart_data()
   {
      $data['total_masuk'] = $this->surat_masuk->hitungsuratmasuk();
      $data['total_keluar'] = $this->surat_keluar->hitungsuratkeluar();
      echo json_encode($data);
   }
}