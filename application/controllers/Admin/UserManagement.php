<?php
defined('BASEPATH') or exit('No direct script allowed');

class UserManagement extends CI_Controller
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
            $this->db->where('status !=', 5);
            $users = $this->db->get('users')->result();
            $data = array(
                'users' => $users
            );
            $this->load->view('admin/user_management', $data);
        } else {
            redirect(base_url('admin'));
        }
    }
    public function delete_user()
    {
        $user_id = $this->input->get('id');
        $this->db->where('id', $user_id);
        $data = array(
            'status' => 5
        );
        $this->db->update('users', $data);
        $this->session->set_flashdata('delete_success', 'User deleted successfully');
        redirect(base_url('admin/user-management'));
    }

    public function active_toggle() {
        $user_id = $this->input->get('id');
        $this->db->where('id', $user_id);
        $user = $this->db->get('users')->row();
        if($user->status == 1){
            $data = array(
                'status' => 0
            );
        }else{
            $data = array(
                'status' => 1
            );
        }
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        redirect(base_url('admin/user-management'));
    }
}
