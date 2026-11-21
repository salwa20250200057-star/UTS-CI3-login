<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('user');
        }
    }

    public function index()
    {
        $data['name'] = $this->session->userdata('name');
        $this->load->view('dashboard/index', $data);
    }
}