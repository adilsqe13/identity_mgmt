<?php
defined('BASEPATH') or exit('No direct script allowed');

class Edit_profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('UserModel');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('id', $user_id);
        $user = $this->db->get('users')->row();
        $data['user'] = $user;
        if ($this->session->userdata('user_logged_in')) {
            $this->load->view('user/edit_profile', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    public function edit_profile()
    {
        $post = $this->input->post();
        $id = $this->session->userdata('user_id');

        $result = $this->UserModel->validate_edit_user($post, $id);

        if ($result == 'success') {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // 2MB
            $config['max_width'] = 2048;
            $config['max_height'] = 2048;

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('p_image')) {
                $data = [
                    'f_name' => $post['f_name'],
                    'email' => $post['email'],
                    'mobile' => $post['mobile'],
                    'dob' => $post['dob'],
                    'address' => $post['address'],
                    'modified_date' => time(),
                ];

                $success = $this->UserModel->edit_user($data, $id);
                if ($success) {
                    $this->session->set_flashdata('update_user_success', 'Profile updated successfully.');
                    redirect(base_url('dashboard/profile'));
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong.');
                    redirect(base_url("dashboard/profile"));
                }
            } else {
                $upload_data = $this->upload->data();

                // Save the name and file information to the database
                $data = [
                    'f_name' => $post['f_name'],
                    'email' => $post['email'],
                    'mobile' => $post['mobile'],
                    'dob' => $post['dob'],
                    'address' => $post['address'],
                    'p_image' => $upload_data['file_name'],
                    'modified_date' => time(),
                ];

                $success = $this->UserModel->edit_user($data, $id);
                if ($success) {
                    $this->session->set_flashdata('update_user_success', 'Profile updated successfully.');
                    redirect(base_url('dashboard/profile'));
                } else {
                    $this->session->set_flashdata('error', 'Something went wrong.');
                    redirect(base_url("dashboard/profile"));
                }
            }
        } elseif ($result == 'email_error') {
            $this->session->set_flashdata('email_error', 'Email is already registered.');
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            $this->session->set_flashdata('dob', $post['dob']);
            $this->session->set_flashdata('address', $post['address']);
            redirect(base_url("dashboard/profile/edit_profile"));
        } elseif ($result == 'mobile_error') {
            $this->session->set_flashdata('mobile_error', 'Mobile number is already registered.');
            $this->session->set_flashdata('id', '');
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            $this->session->set_flashdata('dob', $post['dob']);
            $this->session->set_flashdata('address', $post['address']);
            redirect(base_url("dashboard/profile/edit_profile"));
        } elseif ($result == 'email_mobile_error') {
            $this->session->set_flashdata('email_error', 'Email is already registered.');
            $this->session->set_flashdata('mobile_error', 'Mobile number is already registered.');
            $this->session->set_flashdata('id', '');
            $this->session->set_flashdata('email', $post['email']);
            $this->session->set_flashdata('f_name', $post['f_name']);
            $this->session->set_flashdata('mobile', $post['mobile']);
            $this->session->set_flashdata('dob', $post['dob']);
            $this->session->set_flashdata('address', $post['address']);
            redirect(base_url("dashboard/profile/edit_profile"));
        } else {
            $this->session->set_flashdata('error', 'An error occurred. Please try again.');
            redirect(base_url("dashboard/profile/edit_profile"));
        }
    }
}
