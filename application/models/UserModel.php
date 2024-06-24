<?php
defined('BASEPATH') or exit('No direct script allowed');
class UserModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->config('email');
    }


    public function login($post)
    {
        $user = $this->db->where('email', $post['email'])->get('users')->row();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function save_login_details($login_data)
    {
        $this->db->insert('login_details', $login_data);
    }

    public function signup($post, $random_password)
    {
        $hashed_password = password_hash($random_password, PASSWORD_DEFAULT);
        $data = array(
            'f_name' => $post['f_name'],
            'email' => $post['email'],
            'mobile' => $post['mobile'],
            'password' => $hashed_password,
            'added_date' => time()
        );
        if ($this->db->insert('users', $data)) {
            return true;
        } else {
            return false;
        }
        return false;
    }


    public function validate_user($post)
    {
        // Check if the email already exists for another user
        $this->db->where('email', $post['email']);
        $query_email = $this->db->get('users');

        // Check if the mobile already exists for another user
        $this->db->where('mobile', $post['mobile']);
        $query_mobile = $this->db->get('users');

        if ($query_email->num_rows() > 0 && $query_mobile->num_rows() > 0) {
            return 'email_mobile_error'; // Email & Mobile already exists
        } else if ($query_email->num_rows() > 0) {
            return 'email_error'; // Email already exists
        } else if ($query_mobile->num_rows() > 0) {
            return 'mobile_error'; // Mobile already exists
        }
        return 'success';
    }

    public function validate_edit_user($post, $id)
    {
        // Check if the email already exists for another user
        $this->db->where('email', $post['email']);
        $this->db->where('id !=', $id);
        $query_email = $this->db->get('users');

        // Check if the mobile already exists for another user
        $this->db->where('mobile', $post['mobile']);
        $this->db->where('id !=', $id);
        $query_mobile = $this->db->get('users');

        if ($query_email->num_rows() > 0 && $query_mobile->num_rows() > 0) {
            return 'email_mobile_error'; // Email & Mobile already exists
        } else if ($query_email->num_rows() > 0) {
            return 'email_error'; // Email already exists
        } else if ($query_mobile->num_rows() > 0) {
            return 'mobile_error'; // Mobile already exists
        }
        return 'success';
    }

    public function generate_random_password($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);
        $random_password = '';
        for ($i = 0; $i < $length; $i++) {
            $random_password .= $characters[rand(0, $characters_length - 1)];
        }
        return $random_password;
    }

    public function send_password_email($to_email, $password)
    {

        // Set the email details
        
        $subject = 'Your New Password';
        $message = 'Your new password is: ' . $password;

        $this->email->from($this->config->item('smtp_user'), 'Identity Management');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        // Send the email
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    // Send reset password link
    public function send_reset_password_link($to_email, $user_id)
    {

        // Set the email details
        $timestamp = time();
        $baseUrl = base_url('reset-password?time='. $timestamp . '&&user_id=' . $user_id);
        $subject = 'Reset Password | valid for 30 minutes';
        $message = 'Link:' . $baseUrl;

        $this->email->from($this->config->item('smtp_user'), 'Identity Management');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);

        // Send the email
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }

    // Edit User
    public function edit_user($data, $user_id)
    {
        // Check if the email already exists for another user
        $this->db->where('email', $data['email']);
        $this->db->where('id !=', $user_id);
        $query_email = $this->db->get('users');

        // Check if the mobile already exists for another user
        $this->db->where('mobile', $data['mobile']);
        $this->db->where('id !=', $user_id);
        $query_mobile = $this->db->get('users');

        if ($query_email->num_rows() > 0) {
            return 'email_error'; // Email already exists
        } else if ($query_mobile->num_rows() > 0) {
            return 'mobile_error'; // Mobile already exist
        } else {
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            return true;
        }
        return false;
    }

    // Reset Password
    public function change_password($user_id , $new_password)
    {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Prepare the data to be updated
        $data = array(
            'password' => $hashed_password,
            'modified_date' => time()
        );
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return true; // Password updated successfully
        } else {
            return false; // Failed to update the password
        }
    }
}
