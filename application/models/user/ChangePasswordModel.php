<?php
defined('BASEPATH') or exit('No direct script allowed');
class ChangePasswordModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function check_current_password($current_password)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            redirect(base_url('/'));
        }
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        $user = $query->row();
        if (password_verify($current_password, $user->password)) {
            return true;
        } else {
            return false;
        }
    }

    public function change_password($new_password)
    {
        $user_id = $this->session->userdata('user_id');
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
