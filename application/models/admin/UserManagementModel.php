<?php
defined('BASEPATH') or exit('No direct script allowed');
class UserManagementModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    // Add User
    public function add_user($data)
    {
        // Check if the email already exists
        $query_email = $this->db->where('email', $data['email'])->get('users');
        $query_mobile = $this->db->where('mobile', $data['mobile'])->get('users');


        if ($query_email->num_rows() > 0) {
            return 'email_error'; // Email already exists
        } elseif ($query_mobile->num_rows() > 0) {
            return 'mobile_error';  // Mobile already exists
        } else {
            $this->db->insert('users', $data); // Insert the data
            return true;
        }
    }
}
