<?php
defined('BASEPATH') or exit('No direct script allowed');

class ResetPassword extends CI_Controller
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
        $current_time = time();
        $start_time = $this->input->get('time');
        $minutes = abs($current_time - $start_time)/60;
        if($minutes <= 30){
            $this->load->view('user/reset_password');
        }else{
            $this->session->set_flashdata('link_expired', 'Reset password link has been expired. ');
            redirect('login');
        }
    }

    // Send Reset Password Email
    public function reset_password()
    {
        $post = $this->input->post();
        $user_id = $post['user_id'];
        $password_1 = $post['password-1'];
        $password_2 = $post['password-2'];

        if(strlen($password_1) < 8){
            $this->session->set_flashdata('password_count_error', 'Password must be between 8 and 12 characters. ');
            $this->session->set_flashdata('password-1', $password_1);
            redirect(base_url('reset-password?user_id=' . $user_id));
        }else if(strlen($password_1) > 12){
            $this->session->set_flashdata('password_count_error', 'Password must be between 8 and 12 characters. ');
            $this->session->set_flashdata('password-1', $password_1);
            redirect(base_url('reset-password?user_id=' . $user_id));
        }else if($password_1 != $password_2) {
            $this->session->set_flashdata('password_mismatch', 'Re-typed password is mismatched. ');
            $this->session->set_flashdata('password-1', $password_1);
            redirect(base_url('reset-password?user_id=' . $user_id));
        }else{
            $result = $this->UserModel->change_password($user_id, $password_2);
            if ($result) {
                $this->session->set_flashdata('password_changed', 'Password Reset Successfully.');
                redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('error', 'Something went wrong.');
                redirect(base_url('login'));
            }
        }
        
    }
}
