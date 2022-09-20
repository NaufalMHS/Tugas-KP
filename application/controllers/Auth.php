<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }
  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      // validasi
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $akun = $this->db->get_where('akun', ['email' => $email])->row_array();
    if ($akun) {
      //ak
      if ($akun['is_active'] == 1) {
        if (password_verify($password, $akun['password'])) {
          $data = [

            'email' => $akun['email'],
            'role_id' => $akun['role_id']
          ];
          $this->session->set_userdata($data);
          if ($akun['role_id'] == 2) {
            redirect('admin');
          } else {
            redirect('user');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="aler alert-danger"role="alert">Password Salah!</div>');
          redirect('Auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert
          alert-danger"role="alert">Email tidak aktif</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak ada!</div>');
      redirect('auth');
    }
  }
  public function registration()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]', [
      'is_unique' => 'this terdaftar'
    ]);
    $this->form_validation->set_rules('password1', 'password1', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'pasword beda!',
      'min_length' => 'to short'
    ]);
    $this->form_validation->set_rules('password2', 'password2', 'required|trim|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
      ];

      $this->db->insert('akun', $data);
      redirect('auth');
    }
  }

  public function logout()
  {

    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success"
    role="alert">You have been logged out!</div>');
    redirect('auth');
  }
}