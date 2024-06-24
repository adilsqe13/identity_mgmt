<?php
defined('BASEPATH') or exit('No direct script allowed');

class NotificationManagement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('admin/NotificationManagementModel');
        $this->load->database();
    }

    public function index()
    {
        if ($this->session->userdata('admin_logged_in')) {
            $this->db->where('status !=', 5);
            $users = $this->db->get('users')->result();
            $data = array(
                'users' => $users
            );
            $this->load->view('admin/notification_management', $data);
        } else {
            redirect(base_url('admin'));
        }
    }

    public function send_email()
    {
        $post = $this->input->post();
        $success = $this->NotificationManagementModel->send_email($post);

        if($success){
            $this->session->set_flashdata('success', 'SENT');
            redirect(base_url('admin/notification-management'));
        }else{
            $this->session->set_flashdata('error', 'Something went wrong.');
            redirect(base_url('admin/notification-management'));
        }
    }
    
}
