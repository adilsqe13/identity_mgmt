<?php
defined('BASEPATH') or exit('No direct script allowed');

class AddUser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }

    public function index()
    {
        if ($this->session->userdata('admin_logged_in')) {
            $this->db->where('status !=', 5);
            $users = $this->db->get('users')->result();
            $data = array(
                'users' => $users
            );
            $this->load->view('admin/add_user_page', $data);
        } else {
            redirect(base_url('admin'));
        }
    }

    public function add_user()
    {
        $post = $this->input->post();
        $result = $this->UserModel->validate_user($post);

        if ($result == 'success') {
            $random_password = $this->UserModel->generate_random_password();

            $user = $this->UserModel->signup($post, $random_password);

            if ($user) {
                $success = $this->UserModel->send_password_email($post['email'], $random_password);
                if ($success) {
                    $this->session->set_flashdata('add_user_success', 'User added successfully');
                    redirect(base_url('admin/user-management'));
                } else {
                    echo $this->email->print_debugger();
                    $this->session->set_flashdata('add_user_error', 'Something went wrong');
                    $this->load->view('admin/user-management/add_user');
                }
            } else {
                $this->session->set_flashdata('signup_error', 'Something went wrong1');
                redirect(base_url('admin/user-management/add_user'));
            }
        } else if ($result == 'email_error') {
            $this->session->set_flashdata('email_error', 'Email is already registered');
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            redirect(base_url('admin/user-management/add_user'));
        } else if ($result == 'mobile_error') {
            $this->session->set_flashdata('mobile_error', 'Mobile number is already registered');
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            redirect(base_url('admin/user-management/add_user'));
        } else if ($result == 'email_mobile_error') {
            $this->session->set_flashdata('email_error', 'Email is already registered');
            $this->session->set_flashdata('mobile_error', 'Mobile number is already registered');
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            redirect(base_url('admin/user-management/add_user'));
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect(base_url('admin/user-management/add_user'));
        }
    }
}
