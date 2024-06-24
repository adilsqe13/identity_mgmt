<?php
defined('BASEPATH') or exit('No direct script allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        if ($this->session->userdata('user_logged_in')) {
            $this->load->view('user/dashboard');
        } else {
            redirect(base_url('/'));
        }
    }
}