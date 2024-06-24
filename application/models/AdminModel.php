<?php
defined('BASEPATH') or exit('No direct script allowed');
class AdminModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function login($post)
    {
        $admin = $this->db->where('email', $post['email'])->get('admin')->row();
        if($admin){
            if (password_verify($post['password'] , $admin->password)) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }
}