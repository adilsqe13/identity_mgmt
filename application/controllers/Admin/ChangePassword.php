<?php
defined('BASEPATH') or exit('No direct script allowed');

class ChangePassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('admin/ChangePasswordModel');
    }

    public function index()
    {
        if ($this->session->userdata('admin_logged_in')) {
            $this->load->view('admin/change_password');
        } else {
            redirect(base_url('admin'));
        }
    }

    public function change_password()
    {
        $post = $this->input->post();

        // Check current password
        $result = $this->ChangePasswordModel->check_current_password($post['current_password']);

        if ($result) {
            if (strlen($post['password-1']) < 8 ) {
                $this->session->set_flashdata('password_count_error', 'Password must be between 8 and 12 characters. ');
                $this->session->set_flashdata('current_password', $post['current_password']);
                $this->session->set_flashdata('password-1', $post['password-1']);
                redirect(base_url('admin/dashboard/change-password'));
            } else if (strlen($post['password-1']) > 12 ) {
                $this->session->set_flashdata('password_count_error', 'Password must be between 8 and 12 characters. ');
                $this->session->set_flashdata('current_password', $post['current_password']);
                $this->session->set_flashdata('password-1', $post['password-1']);
                redirect(base_url('admin/dashboard/change-password'));
            } else if ($post['password-1'] !== $post['password-2']) {
                $this->session->set_flashdata('password_mismatch', 'Re-typed password is mismatched. ');
                $this->session->set_flashdata('current_password', $post['current_password']);
                $this->session->set_flashdata('password-1', $post['password-1']);
                redirect(base_url('admin/dashboard/change-password'));
            } else {
                //Change password on the Database
                $result = $this->ChangePasswordModel->change_password($post['password-2']);
                if ($result) {
                    $this->session->set_flashdata('password_changed', 'Password changed successfully.');
                    redirect(base_url('admin/dashboard'));
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong.');
                    redirect(base_url('admin/dashboard/change-password'));
                }
            }
        } else {
            $this->session->set_flashdata('current_password_error', 'Wrong Current Password');
            $this->session->set_flashdata('current_password', $post['current_password']);
            $this->session->set_flashdata('password-1', $post['password-1']);
            $this->session->set_flashdata('password-2', $post['password-2']);
            redirect(base_url('admin/dashboard/change-password'));
        }
    }
}
