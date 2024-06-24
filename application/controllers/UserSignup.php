<?php
defined('BASEPATH') or exit('No direct script allowed');

class UserSignup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->model('UserModel');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->config('email');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Load the login view
        $this->load->view('auth/user_signup');
    }

    public function signup()
    {
        $post = $this->input->post();
        $result = $this->UserModel->validate_user($post);

        if ($result == 'success') {
            $random_password = $this->UserModel->generate_random_password();

            $user = $this->UserModel->signup($post, $random_password);

            if ($user) {
                $success = $this->UserModel->send_password_email($post['email'], $random_password);
                if ($success) {
                    $this->session->set_flashdata('signup_success', 'Registered successfully, Please check your email.');
                    redirect(base_url('/'));
                } else {
                    echo $this->email->print_debugger();
                    $this->session->set_flashdata('signup_error', 'Something went wrong');
                    $this->load->view('signup');
                }
            } else {
                $this->session->set_flashdata('signup_error', 'Something went wrong');
                redirect(base_url('signup'));
            }
        } else if ($result == 'email_error') {
            $this->session->set_flashdata('email_error', 'Email is already registered');
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            redirect(base_url('signup'));
        } else if ($result == 'mobile_error') {
            $this->session->set_flashdata('mobile_error', 'Mobile number is already registered');
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            redirect(base_url('signup'));
        } else if ($result == 'email_mobile_error') {
            $this->session->set_flashdata('email_error', 'Email is already registered');
            $this->session->set_flashdata('mobile_error', 'Mobile number is already registered');
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            redirect(base_url('signup'));
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect(base_url('signup'));
        }
    }
}
