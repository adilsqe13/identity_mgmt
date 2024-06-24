<?php
defined('BASEPATH') or exit('No direct script allowed');

class EditUserProfile extends CI_Controller
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

            // Fetch user informations
            $user_id = $this->input->get('user_id');
            $this->db->where('id=', $user_id);
            $user = $this->db->get('users')->row();

            // fetch All Users
            $this->db->where('status !=', 5);
            $users = $this->db->get('users')->result();
            $data = array(
                'users' => $users,
                'user' => $user
            );
            $this->load->view('admin/edit_profile', $data);
        } else {
            redirect(base_url('admin'));
        }
    }

    public function edit_user()
    {
        $post = $this->input->post();
        $id = $post['user_id'];
        $data = [
            'f_name' => $post['f_name'],
            'email' => $post['email'],
            'mobile' => $post['mobile'],
            'modified_date' => time(),
        ];
        $result = $this->UserModel->validate_edit_user($post, $id);


        if ($result == 'success') {
            $success = $this->UserModel->edit_user($data, $id);
            if($success){
                $this->session->set_flashdata('update_user_success', 'User updated successfully.');
                redirect(base_url('admin/user-management/user_profile?user_id=' . $id));
            }else{
                $this->session->set_flashdata('error', 'Something went wrong.');
                redirect(base_url('admin/user-management/edit_user_profile?user_id=' . $id));
            }
            
        } elseif ($result == 'email_error') {
            $this->session->set_flashdata('email_error', 'Email is already registered.');
            $this->session->set_flashdata('user_id', $id);
            $this->session->set_flashdata('email', $data['email']);
            $this->session->set_flashdata('f_name', $data['f_name']);
            $this->session->set_flashdata('mobile', $data['mobile']);
            redirect(base_url('admin/user-management/edit_user_profile?user_id=' . $id));
        } elseif ($result == 'mobile_error') {
            $this->session->set_flashdata('mobile_error', 'Mobile number is already registered.');
            $this->session->set_flashdata('user_id', $id);
            $this->session->set_flashdata('email', $data['email']);
            $this->session->set_flashdata('f_name', $data['f_name']);
            $this->session->set_flashdata('mobile', $data['mobile']);
            redirect(base_url('admin/user-management/edit_user_profile?user_id=' . $id));
        }elseif ($result == 'email_mobile_error') {
            $this->session->set_flashdata('email_error', 'Email is already registered.');
            $this->session->set_flashdata('mobile_error', 'Mobile number is already registered.');
            $this->session->set_flashdata('user_id', $id);
            $this->session->set_flashdata('email', $data['email']);
            $this->session->set_flashdata('f_name', $data['f_name']);
            $this->session->set_flashdata('mobile', $data['mobile']);
            redirect(base_url('admin/user-management/edit_user_profile?user_id=' . $id));
        } else {
            $this->session->set_flashdata('error', 'An error occurred. Please try again.');
            redirect(base_url('admin/user-management/edit_user_profile?user_id=' . $id));
        }
    }
}
