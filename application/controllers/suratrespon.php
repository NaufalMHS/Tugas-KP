<?php
defined('BASEPATH') or exit('No direct script access allowed');

class suratrespon extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Data Surat Respon';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        if (!isset($_POST['filter'])) {
            $data['surat_respon'] = $this->surat_respon->semuadata();
        } else {
            $startdate = $this->input->post('startdate');
            $enddate = $this->input->post('enddate');
            $data['surat_respon'] = $this->surat_respon->filter_tanggal($startdate, $enddate);
        }
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/respon', $data);
        $this->load->view('templates/footer',);
    }
    public function laporan()
    {
        $data['title'] = 'Laporan Surat Respon';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_masuk'] = $this->surat_keluar->semuadata();
        $data['tahun'] = $this->surat_masuk->hitungbytahun();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        // $data['hari'] = $this->surat_keluar->hitungbytahun();
        // $data['bulan'] = $this->surat_keluar->hitungbytahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan_surat_respon', $data);
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
            $data['datafilter'] = $this->surat_respon->hitungtanggal($tanggalawal, $tanggalakhir);


            $this->load->view('admin/print_respon', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = 'Laporan per-bulan';
            $data['subtitle'] = "Dari bulan : " . $bulanawal . 'Sampai bula : ' . $bulanakhir . 'tahun :' . $tahun1;
            $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->surat_respon->hitungbulan($tahun1, $bulanawal, $bulanakhir);


            $this->load->view('admin/print_respon', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = 'Laporan per-tahun';
            $data['subtitle'] =  'tahun :' . $tahun2;
            $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->surat_respon->hitungtahun($tahun2);

            $this->load->view('admin/print_respon', $data);
        }
    }
    public function tambahrespon($id)
    {
        $data['title'] = 'Surat Respon';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_surat_respon'] = $this->surat_respon->detailnomorrespon($id);
        $data['jenis'] = $this->surat_respon->getdata();
        $data['perihal'] = $this->surat_keluar->getperihal();
        $data['id'] = $id;
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambahrespon', $data);
        $this->load->view('templates/footer',);
    }

    public function proses_respon_now($act = 'insert')
    {
        $nomor_surat_respon = $this->input->post('nomor_surat_respon', TRUE);
        $tanggal_surat_respon = date('Y-m-d');
        $id_surat_masuk = $this->input->post('nomor_surat_masuk', TRUE);
        $jenis_surat_respon = $this->input->post('id_jabatan', TRUE);
        $jabatan_surat_respon = $this->input->post('jabatan_surat_respon', TRUE);
        $perihal_surat_respon = $this->input->post('perihal_surat_respon', TRUE);
        $tujuan_surat_respon = $this->input->post('tujuan_surat_respon', TRUE);
        $id_surat_masuk = $this->input->post('id_surat_masuk', FALSE);
        $nomor_surat = $this->nomorsurat($tanggal_surat_respon);


        if ($act == 'insert') {
            // Data Insert
            $data['nomor_surat_masuk'] = $id_surat_masuk;
            $data['tanggal_surat_respon'] = $tanggal_surat_respon;
            $data['jenis_surat_respon'] = $jenis_surat_respon;
            $data['jabatan_surat_respon'] = $jabatan_surat_respon;
            $data['perihal_surat_respon'] = $perihal_surat_respon;
            $data['tujuan_surat_respon'] = $tujuan_surat_respon;
            $data['nomor_surat_respon'] = $nomor_surat;

            // End Data Insert

            // Data Insert Surat Keluar
            $data_surat_keluar['tanggal_surat_keluar'] = $tanggal_surat_respon;
            $data_surat_keluar['jenis_surat_keluar'] = $jenis_surat_respon;
            $data_surat_keluar['jabatan_surat_keluar'] = $jabatan_surat_respon;
            $data_surat_keluar['perihal_surat_keluar'] = $perihal_surat_respon;
            $data_surat_keluar['tujuan_surat_keluar'] = $tujuan_surat_respon;
            $data_surat_keluar['nomor_surat_keluar'] = $this->nomorsurat($tanggal_surat_respon);
            $data_surat_keluar['status'] = 'N';
            // End Data Insert


            // $data['nomor_surat_respon'] = $nomor_surat;
            $this->db->insert('surat_keluar', $data_surat_keluar);
            $this->db->insert('surat_respon', $data);

            // update is_respon di surat masuk
            $this->db->where('id_surat_masuk', $id_surat_masuk);
            $this->db->update('surat_masuk', array(
                "is_respon" => 1
            ));

            $this->session->set_flashdata('pesan', '<div class="alert alert-success"role="alert">Data berhasil ditambah!</div>');
            redirect("suratrespon/detailnomorrespon/" . $nomor_surat);
        } else {
            $config['upload_path']            = './uploads/';
            $config['allowed_types']        = 'doc|PDF|jpg|png|pdf|.pdf|docx';
            $config['max_size']             = 10000;
            //$config['max_width']            = 10000;
            //$config['max_height']           = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $file = 'AAAA';
            } else {
                $fileUpload = $this->upload->data();
                $file = $fileUpload['file_name'];
            }
            $data['file'] = $file;
            // var_dump($data['file']);
            // die();
            $this->db->where('nomor_surat_respon', $nomor_surat_respon);
            $this->db->update('surat_respon', array(
                "is_upload" => 1
            ));
            $this->db->where("nomor_surat_respon", str_replace('/', '-', $_POST['no_surat_respon']));
            $this->db->update('surat_respon', $data);
            $this->db->update('surat_keluar', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"role="alert">Data berhasil diupdate!</div>');
            redirect("suratrespon");
        }



        // redirect('suratrespon');
    }
    public function setuju($id)
    {
        // $id_surat_keluar = $this->input->post('id_surat_keluar', TRUE);

        $data['approve'] = 'approve';

        $this->db->where('id_surat_respon', $id);
        $this->db->update('surat_respon', $data);
        redirect("suratrespon");
    }
    public function tolak($id)
    {
        // $id_surat_keluar = $this->input->post('id_surat_keluar', TRUE);

        $data['approve'] = 'tolak';

        $this->db->where('id_surat_respon', $id);
        $this->db->update('surat_respon', $data);
        redirect("suratrespon");
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Surat Respon';
        $data['id'] = $id;
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_surat_respon'] = $this->surat_respon->detailsuratrespon($id);
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailsuratrespon', $data);
        $this->load->view('templates/footer',);
    }
    public function approve()
    {
        $data['title'] = 'Admin';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['is_approve'] = $this->surat_respon->approve();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/approve_respon', $data);
        $this->load->view('templates/footer',);
    }
    public function detailnomorrespon($id)
    {
        $data['title'] = 'Detail Nomor Surat Respon';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_respon'] = $this->surat_respon->semuadata();
        $data['nomor_surat_respon'] = $this->surat_respon->nomorsuratrespon($id);
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $data['id'] = $id;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailnomorrespon', $data);
        $this->load->view('templates/footer',);
    }

    public function nomorsurat($tgl = null)
    {
        $tgl_input = ($tgl == null) ? $this->input->post('tanggal_surat_keluar', TRUE) : date("Y-m-d");

        $tgl = substr($tgl_input, 5, 6);
        $bln_final = null;

        $bulan = substr($tgl_input, 5, 6);

        var_dump($bulan);

        $thn = substr($tgl_input, 0, 4);

        print_r($bulan);
        // $auto = $this->db->query("SELECT COUNT(`id_surat_keluar`) as max_code FROM surat_keluar WHERE month(tanggal_surat_keluar) = '$bulan'");
        $auto = $this->db->query("SELECT COUNT(`id_surat_keluar`) as max_code FROM surat_keluar WHERE month(tanggal_surat_keluar) = '$bulan'");
        $no = $auto->row();
        $noUrut = $no->max_code + 1;
        $kode = sprintf("%03s", $noUrut);

        $jabatan = $this->input->post('id_jabatan', TRUE);

        switch ($tgl) {
            case 1:
                $bln_final = "I";
                break;
            case 2:
                $bln_final = "II";
                break;
            case 3:
                $bln_final = "III";
                break;
            case 4:
                $bln_final = "IV";
                break;
            case 5:
                $bln_final = "V";
                break;
            case 6:
                $bln_final = "VI";
                break;
            case 7:
                $bln_final = "VII";
                break;
            case 8:
                $bln_final = "VIII";
                break;
            case 9:
                $bln_final = "IX";
                break;
            case 10:
                $bln_final = "X";
                break;
            case 11:
                $bln_final = "XI";
                break;
            case 12:
                $bln_final = "XII";
                break;
        }

        $finalCode =  $kode . '-LRS-' . 'PHL-' . $jabatan . '-' . $bln_final . '-' . $thn;

        return $finalCode;
    }

    public function nomorsuratkeluar($tgl = null)
    {
        $tgl_input = ($tgl == null) ? $this->input->post('tanggal_surat_keluar', TRUE) : date("Y-m-d");

        $tgl = substr($tgl_input, 5, 6);
        $bln_final = null;

        $bulan = substr($tgl_input, 5, 6);

        var_dump($bulan);

        $thn = substr($tgl_input, 0, 4);

        print_r($bulan);
        $auto = $this->db->query("SELECT COUNT(`id_surat_keluar`) as max_code FROM surat_keluar WHERE month(tanggal_surat_keluar) = '$bulan'");
        $no = $auto->row();
        $noUrut = $no->max_code + 1;
        $kode = sprintf("%03s", $noUrut);

        $jabatan = $this->input->post('id_jabatan', TRUE);
        $perihal = $this->input->post('perihal_surat_keluar', TRUE);


        switch ($tgl) {
            case 1:
                $bln_final = "I";
                break;
            case 2:
                $bln_final = "II";
                break;
            case 3:
                $bln_final = "III";
                break;
            case 4:
                $bln_final = "IV";
                break;
            case 5:
                $bln_final = "V";
                break;
            case 6:
                $bln_final = "VI";
                break;
            case 7:
                $bln_final = "VII";
                break;
            case 8:
                $bln_final = "VIII";
                break;
            case 9:
                $bln_final = "IX";
                break;
            case 10:
                $bln_final = "X";
                break;
            case 11:
                $bln_final = "XI";
                break;
            case 12:
                $bln_final = "XII";
                break;
        }

        $finalCode =  $kode . '-LRS-' . $perihal . '-' . $jabatan . '-' . $bln_final . '-' . $thn;

        return $finalCode;
    }
}