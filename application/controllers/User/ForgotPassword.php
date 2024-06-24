<?php
defined('BASEPATH') or exit('No direct script allowed');

class ForgotPassword extends CI_Controller
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
        $this->load->view('user/forgot_password');
    }

    // Send Reset Password Email
    public function send_reset_pass_mail()
    {
        $post = $this->input->post();

        // validate email
        $this->db->where('email', $post['email']);
        $query_email = $this->db->get('users');
        $user = $query_email->row();
        $user_id = $user->id;

        if ($query_email->num_rows() > 0) {
            $this->UserModel->send_reset_password_link($post['email'], $user_id);
            $this->session->set_flashdata('link_sent', 'Reset password link has been sent to your email');
            redirect(base_url('login'));
        } else {
            $this->session->set_flashdata('invalid_email', 'Invalid Email Id');
            $this->session->set_flashdata('email', $post['email']);
            redirect(base_url('forgot-password'));
        }
    }
}
