<?php
defined('BASEPATH') or exit('No direct script allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->library('session');
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('id', $user_id);
        $user = $this->db->get('users')->row();
        $data['user'] = $user;
        if ($this->session->userdata('user_logged_in')) {
            $this->load->view('user/profile', $data);
        } else {
            redirect(base_url('login'));
        }
    }

   
}
