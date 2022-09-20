<?php
defined('BASEPATH') or exit('No direct script access allowed');

class suratmasuk extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Data Surat Masuk';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        if (!isset($_POST['filter'])) {
            $data['surat_masuk'] = $this->surat_masuk->semuadata();
        } else {
            $startdate = $this->input->post('startdate');
            $enddate = $this->input->post('enddate');
            $data['surat_masuk'] = $this->surat_masuk->filter_tanggal($startdate, $enddate);
        }
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/masuk', $data);
        $this->load->view('templates/footer',);
    }
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['suratmasuk'] = $this->surat_masuk->semuadata();

        $this->load->view('admin/laporan_masuk_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_surat.pdf", array('Attachment' => 0));
    }
    public function laporan()
    {
        $data['title'] = 'Laporan Surat Masuk';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->surat_masuk->semuadata();
        $data['tahun'] = $this->surat_masuk->hitungbytahun();

        // $data['hari'] = $this->surat_masuk->hitungbytahun();
        // $data['bulan'] = $this->surat_masuk->hitungbytahun();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan_surat_masuk', $data);
        $this->load->view('templates/footer',);
    }
    public function filter()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = 'Laporan per-hari';
            $data['subtitle'] = "Dari tanggal : " . $tanggalawal . 'Sampai Tanggal : ' . $tanggalakhir;
            $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->surat_masuk->hitungtanggal($tanggalawal, $tanggalakhir);


            $this->load->view('admin/print_masuk', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = 'Laporan per-bulan';
            $data['subtitle'] = "Dari bulan : " . $bulanawal . 'Sampai bula : ' . $bulanakhir . 'tahun :' . $tahun1;
            $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->surat_masuk->hitungbulan($tahun1, $bulanawal, $bulanakhir);


            $this->load->view('admin/print_masuk', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = 'Laporan per-tahun';
            $data['subtitle'] =  'tahun :' . $tahun2;
            $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->surat_masuk->hitungtahun($tahun2);

            $this->load->view('admin/print_masuk', $data);
        }
    }
    public function search()
    {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
    }
    public function tambahdata()
    {
        $data['title'] = 'Surat Masuk';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->surat_masuk->semuadata();
        $box['jenis'] = $this->surat_masuk->getdata();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambahsuratmasuk', $box);
        $this->load->view('templates/footer',);
    }

    public function proses_masuk()
    {
        $config['upload_path']            = './uploads/';
        $config['allowed_types']        = 'doc|PDF|jpg|png|pdf|.pdf|docx';
        $config['max_size']             = 10000;
        //$config['max_width']            = 10000;
        //$config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "gagal Tambah";
        } else {
            $file = $this->upload->data();
            $file = $file['file_name'];
            $no_surat_masuk = $this->input->post('no_surat_masuk', TRUE);
            $jenis_surat_masuk = $this->input->post('id_jabatan', TRUE);
            $perihal_surat_masuk = $this->input->post('perihal_surat_masuk', TRUE);
            $tanggal_surat_masuk = $this->input->post('tanggal_surat_masuk', TRUE);
            $sifat_surat_masuk = $this->input->post('sifat_surat_masuk', TRUE);
            $asal_surat_masuk = $this->input->post('asal_surat_masuk', TRUE);

            $data = array(
                'no_surat_masuk' => $no_surat_masuk,
                'jenis_surat_masuk' => $jenis_surat_masuk,
                'perihal_surat_masuk' => $perihal_surat_masuk,
                'tanggal_surat_masuk' => $tanggal_surat_masuk,
                'sifat_surat_masuk' => $sifat_surat_masuk,
                'asal_surat_masuk' => $asal_surat_masuk,
                'file' => $file
            );
            $this->db->insert('surat_masuk', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"role="alert">Data berhasil ditambah!</div>');
            redirect('suratmasuk');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Surat Masuk';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_surat_masuk'] = $this->surat_masuk->detailsuratmasuk($id);
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailsuratmasuk', $data);
        $this->load->view('templates/footer',);
    }
}