<?php
defined('BASEPATH') or exit('No direct script allowed');

class UserLogManagement extends CI_Controller
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
        if ($this->session->userdata('admin_logged_in')) {
            // $details = $this->db->get('login_details')->result();
            $this->db->select('login_details.*, users.f_name');
            $this->db->from('login_details');
            $this->db->join('users', 'login_details.user_id = users.id');
            $query = $this->db->get()->result();
            
            // Fetch all users
            $this->db->where('status !=', 5);
            $users = $this->db->get('users')->result();


            $data = array(
                'data' => $query,
                'users' => $users
            );
            $this->load->view('admin/user_log_management', $data);
        } else {
            redirect(base_url('admin'));
        }
    }
    
}
