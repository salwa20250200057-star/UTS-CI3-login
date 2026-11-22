<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email    = $this->input->post('email', true);
        $password = $this->input->post('password');
        $user     = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user && $user['is_active'] == 1 && password_verify($password, $user['password'])) {
            $this->session->sess_regenerate(true);
            $this->session->set_userdata([
                'email'   => $user['email'],
                'name'    => $user['name'],
                'role_id' => $user['role_id'],
            ]);
            redirect('dashboard');
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger" role="alert">Email atau password salah.</div>'
        );
        redirect('user');
    }
        public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('name', 'Nama', 'required|trim|max_length[128]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar.',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches'    => 'Password tidak sama.',
            'min_length' => 'Password minimal 6 karakter.',
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
        } else {
            $this->db->insert('user', [
                'name'      => $this->input->post('name', true),
                'email'     => $this->input->post('email', true),
                'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'   => 2,
                'is_active' => 1,
            ]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Akun berhasil dibuat. Silakan login.</div>'
            );
            redirect('user');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user');
    }
}