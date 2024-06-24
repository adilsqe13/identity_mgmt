<?php
defined('BASEPATH') or exit('No direct script allowed');

class UserProfile extends CI_Controller
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
        $user_id = $this->input->get('user_id');
        $this->db->where('id', $user_id);
        $user = $this->db->get('users')->row();
        $data['user'] = $user;
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('admin/user_profile_page', $data);
        } else {
            redirect(base_url('admin'));
        }
    }

   
}
