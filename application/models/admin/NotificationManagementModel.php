<?php
defined('BASEPATH') or exit('No direct script allowed');
class NotificationManagementModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->config('email');
    }


    // Send Email
    public function send_email($post)
    {

        // Set the email details
        $subject = $post['subject'];
        $message = $post['msg_body'];
        $email_array = $post['emails'];

        $this->email->from($this->config->item('smtp_user'), 'Identity Management');

        $this->email->bcc($email_array);
        $this->email->subject($subject);
        $this->email->message($message);

        // Send the email
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}
