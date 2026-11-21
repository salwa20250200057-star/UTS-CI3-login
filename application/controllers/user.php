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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user');
    }
}