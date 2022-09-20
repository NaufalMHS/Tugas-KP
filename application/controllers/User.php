<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

   public function index()
   {
      $data['title'] = 'My Profile';
      $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
      $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
      $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
      $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
      $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/index', $data);
      $this->load->view('templates/footer',);
   }
}