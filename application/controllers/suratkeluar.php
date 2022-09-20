<?php
defined('BASEPATH') or exit('No direct script access allowed');

class suratkeluar extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Data Surat Keluar';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        if (!isset($_POST['filter'])) {
            $data['surat_keluar'] = $this->surat_keluar->semuadata();
        } else {
            $startdate = $this->input->post('startdate');
            $enddate = $this->input->post('enddate');
            $data['surat_keluar'] = $this->surat_keluar->filter_tanggal($startdate, $enddate);
        }

        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();

        $data['surat_keluar'] = $this->surat_keluar->semuadata();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/keluar', $data);
        $this->load->view('templates/footer',);
    }
    public function laporan()
    {
        $data['title'] = 'Laporan Surat Keluar';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->surat_keluar->semuadata();
        $data['tahun'] = $this->surat_keluar->hitungbytahun();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();

        // $data['hari'] = $this->surat_keluar->hitungbytahun();
        // $data['bulan'] = $this->surat_keluar->hitungbytahun();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan_surat_keluar', $data);
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
            $data['datafilter'] = $this->surat_keluar->hitungtanggal($tanggalawal, $tanggalakhir);


            $this->load->view('admin/print_tanggal', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = 'Laporan per-bulan';
            $data['subtitle'] = "Dari bulan : " . $bulanawal . 'Sampai bula : ' . $bulanakhir . 'tahun :' . $tahun1;
            $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->surat_keluar->hitungbulan($tahun1, $bulanawal, $bulanakhir);


            $this->load->view('admin/print_tanggal', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = 'Laporan per-tahun';
            $data['subtitle'] =  'tahun :' . $tahun2;
            $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['datafilter'] = $this->surat_keluar->hitungtahun($tahun2);

            $this->load->view('admin/print_tanggal', $data);
        }
    }
    public function pdf()
    {
        $this->load->library('dompdf_gen');

        $data['suratkeluar'] = $this->surat_keluar->semuadata();

        $this->load->view('admin/laporan_keluar_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_surat.pdf", array('Attachment' => 0));
    }
    public function tambahdata()
    {
        $data['title'] = 'Surat Keluar Backdate';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->surat_keluar->semuadata();
        $box['jenis'] = $this->surat_keluar->getdata();
        $box['perihal'] = $this->surat_keluar->getperihal();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambahsuratkeluar', $box);
        $this->load->view('templates/footer',);
    }
    public function tambahdatanow()
    {
        $data['title'] = 'Surat Keluar';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->surat_keluar->semuadata();
        $box['jenis'] = $this->surat_keluar->getdata();
        $box['perihal'] = $this->surat_keluar->getperihal();
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambahsuratkeluarnow', $box);
        $this->load->view('templates/footer',);
    }
    public function tambahrespon()
    {
        $data['title'] = 'Surat Keluar';
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
        $this->load->view('admin/tambahsuratkeluar', $box);
        $this->load->view('templates/footer',);
    }


    public function proses_keluar($act = 'insert')
    {
        $nomor_surat_keluar = $this->input->post('nomor_surat_keluar', TRUE);
        $tanggal_surat_keluar = $this->input->post('tanggal_surat_keluar', TRUE);
        $jenis_surat_keluar = $this->input->post('id_jabatan', TRUE);
        $jabatan_surat_keluar = $this->input->post('jabatan_surat_keluar', TRUE);
        $perihal_surat_keluar = $this->input->post('perihal_surat_keluar', TRUE);
        $tujuan_surat_keluar = $this->input->post('tujuan_surat_keluar', TRUE);
        $nomor_surat = $this->nomorsurat();

        if ($act == 'insert') {
            // Data Insert
            $data['tanggal_surat_keluar'] = $tanggal_surat_keluar;
            $data['jenis_surat_keluar'] = $jenis_surat_keluar;
            $data['jabatan_surat_keluar'] = $jabatan_surat_keluar;
            $data['perihal_surat_keluar'] = $perihal_surat_keluar;
            $data['tujuan_surat_keluar'] = $tujuan_surat_keluar;

            // End Data Insert


            $data['nomor_surat_keluar'] = $nomor_surat;
            $this->db->insert('surat_keluar', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"role="alert">Data berhasil ditambah!</div>');
            redirect("suratkeluar/detailnomor/" . $nomor_surat);
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
            $this->db->where('nomor_surat_keluar', $nomor_surat_keluar);
            $this->db->update('surat_keluar', array(
                "is_upload" => 1
            ));


            $this->db->where("nomor_surat_keluar", str_replace('/', '-', $_POST['no_surat_keluar']));
            $this->db->update('surat_keluar', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"role="alert">Data berhasil diupdate!</div>');
            redirect("suratkeluar");
        }


        // redirect('suratkeluar');
    }

    public function proses_keluar_now($act = 'insert')
    {
        $tanggal_surat_keluar = date('Y-m-d');
        $jenis_surat_keluar = $this->input->post('id_jabatan', TRUE);
        $jabatan_surat_keluar = $this->input->post('jabatan_surat_keluar', TRUE);
        $perihal_surat_keluar = $this->input->post('perihal_surat_keluar', TRUE);
        $tujuan_surat_keluar = $this->input->post('tujuan_surat_keluar', TRUE);
        $nomor_surat = $this->nomorsurat($tanggal_surat_keluar);

        if ($act == 'insert') {
            // Data Insert
            $data['tanggal_surat_keluar'] = $tanggal_surat_keluar;
            $data['jenis_surat_keluar'] = $jenis_surat_keluar;
            $data['jabatan_surat_keluar'] = $jabatan_surat_keluar;
            $data['perihal_surat_keluar'] = $perihal_surat_keluar;
            $data['tujuan_surat_keluar'] = $tujuan_surat_keluar;

            // End Data Insert

            $data['nomor_surat_keluar'] = $nomor_surat;
            $this->db->insert('surat_keluar', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"role="alert">Data berhasil ditambah!</div>');
            redirect("suratkeluar/detailnomor/" . $nomor_surat);
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

            $this->db->where("nomor_surat_keluar", str_replace('/', '-', $_POST['no_surat_keluar']));
            $this->db->update('surat_keluar', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success"role="alert">Data berhasil diupdate!</div>');
            redirect("suratkeluar");
        }


        // redirect('suratkeluar');
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Surat Keluar';
        $data['id'] = $id;
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['detail_surat_keluar'] = $this->surat_keluar->detailsuratkeluar($id);
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailsuratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function detailnomor($id)
    {
        $data['title'] = 'Detail Nomor Surat Keluar';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['surat_keluar'] = $this->surat_keluar->semuadata();
        $data['nomor_surat_keluar'] = $this->surat_keluar->nomorsuratkeluar($id);
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $data['id'] = $id;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailnomor', $data);
        $this->load->view('templates/footer',);
    }

    public function setuju($id)
    {
        // $id_surat_keluar = $this->input->post('id_surat_keluar', TRUE);

        $data['approve'] = 'approve';

        $this->db->where('id_surat_keluar', $id);
        $this->db->update('surat_keluar', $data);
        redirect("suratkeluar");


        // $data['approve'] = 'menunggu';
        // $id_surat_keluar['id_surat_keluar'] = 'id_surat_keluar';

        // $this->db->where('id_surat_keluar', $id_surat_keluar);
        // $this->db->update('surat_keluar', $data);
        // redirect("suratkeluar");
    }
    public function tolak($id)
    {
        // $id_surat_keluar = $this->input->post('id_surat_keluar', TRUE);

        $data['approve'] = 'tolak';

        $this->db->where('id_surat_keluar', $id);
        $this->db->update('surat_keluar', $data);
        redirect("suratkeluar");
    }

    public function approved($id = null)
    {
        $data['title'] = 'Admin';
        $data['akun'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['is_approve'] = $this->surat_keluar->approve($id);
        $data['total_keluar_pending'] = $this->surat_keluar->hitungsuratkeluarpending();
        $data['total_respon_pending'] = $this->surat_respon->hitungsuratresponpending();
        $data['total_keluar_upload'] = $this->surat_keluar->hitungsuratkeluarupload();
        $data['total_respon_upload'] = $this->surat_respon->hitungsuratresponupload();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/approve', $data);
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
