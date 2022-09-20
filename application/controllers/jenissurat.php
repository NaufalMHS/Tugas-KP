<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jenissurat extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dasbord';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis'] = $this->jenis->semuadata();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jenis', $data);
        $this->load->view('templates/footer',);
    }

    public function tambahdata()
    {
        $data['title'] = 'Dasbord';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->surat_keluar->semuadata();
        $box['jenis'] = $this->surat_keluar->getdata();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambahjenissurat');
        $this->load->view('templates/footer',);
    }
    public function proses_masuk()
    {
        $config['upload_path']            = './uploads/';
        $config['allowed_types']        = 'doc|PDF|jpg|png|pdf|.pdf|docx';
        $config['max_size']             = 10000;
        //$config['max_width']            = 10000;
        //$config['max_height']           = 10000;


        $nama_jabatan = $this->input->post('nama_jabatan', TRUE);
        $singkatan_jabatan = $this->input->post('singkatan_jabatan', TRUE);


        $data = array(
            'nama_jabatan' => $nama_jabatan,
            'singkatan_jabatan' => $singkatan_jabatan,


        );
        $this->db->insert('jabatan', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success"role="alert">Data berhasil ditambah!</div>');
        redirect('suratmasuk');
    }
}
