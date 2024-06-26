<?php
defined('BASEPATH') or exit('No direct script allowed');

class UserLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->model('UserModel');
        $this->load->library('session');
        // $this->load->library('upload');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('auth/user_login');
    }

    public function login()
    {
        // Set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load the login view with errors
            $this->load->view('auth/user_login');
        } else {
            $post = $this->input->post();

            // Check the credentials
            $user = $this->UserModel->login($post);

            if ($user) {
                // Set session data
                $session_data = array(
                    'user_id' => $user->id,
                    'f_name' => $user->f_name,
                    'user_logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);

                // Set login details
                $browser = $this->get_browser_info();
                $login_data = array(
                    'user_id' => $user->id,
                    'browser' => $browser,
                    'login_time' => time()
                );
                $this->UserModel->save_login_details($login_data);
                $this->session->set_flashdata('login_success', 'Logged In Successfully');
                redirect(base_url('dashboard'));
            } else {
                $this->session->set_flashdata('login_error', 'Invalid Credentials');
                $this->session->set_flashdata('email', $post['email']);
                redirect(base_url('/'));
            }
        }
    }

    private function get_browser_info() {
        $this->load->library('user_agent');
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser().' '.$this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }
        return $agent . ' on ' . $this->agent->platform();
    }

    // Logout User
    public function logout()
    {
        $this->session->unset_userdata(array('f_name', 'user_logged_in'));
        $this->session->set_flashdata('user_logged_out', 'Logged Out');
        redirect(base_url('/'));
    }
}
