<?php
defined('BASEPATH') or exit('No direct script allowed');

class Dashboard extends CI_Controller
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
            // fetch all users
            $this->db->where('status !=', 5);
            $this->db->from('users');
            $all_users = $this->db->count_all_results();

            // fetch active users
            $this->db->where('status', 1);
            $this->db->from('users');
            $active_users = $this->db->count_all_results();

            
            $data = array(
                'all_users' => $all_users,
                'active_users' => $active_users
            );
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect(base_url('admin'));
        }
    }

    // Change Password
    public function change_password()
    {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('admin/change_password');
        } else {
            redirect(base_url('admin'));
        }
    }
}
