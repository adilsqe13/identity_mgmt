<?php
defined('BASEPATH') or exit('No direct script allowed');

class AdminLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->model('AdminModel');
        $this->load->library('session');
        // $this->load->library('upload');
        $this->load->library('form_validation');
    }

    public function index() {
        // Load the login view
        $this->load->view('auth/admin_login');
    }

    public function login() {
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load the login view with errors
            $this->load->view('auth/admin_login');
        } else {
            $post = $this->input->post();

            // Check the credentials
            $admin = $this->AdminModel->login($post);

            if ($admin) {
                // Set session data
                $session_data = array(
                    'admin_email' => $admin->email,
                    'admin_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                // Redirect to admin dashboard
                $this->session->set_flashdata('login_success', 'Logged In successfully');
                redirect(base_url('admin/dashboard'));
            } else {
                $this->session->set_flashdata('login_error', 'Invalid Credentials');
                $this->session->set_flashdata('email', $post['email']);
                redirect(base_url('admin'));
            }
        }
    }


    // Logout admin
    public function logout()
    {
        $this->session->unset_userdata(array('admin_email', 'admin_logged_in'));
        $this->session->set_flashdata('logged_out', 'Logged Out');
        redirect(base_url('admin'));
    }
}
