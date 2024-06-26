<?php
defined('BASEPATH') or exit('No direct script allowed');

class TaskManager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for redirect
        $this->load->library('session');
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('user_id', $user_id);
        $this->db->where('status', 1);
        $tasks = $this->db->get('tasks')->result();
        $data['tasks'] = $tasks;
        if ($this->session->userdata('user_logged_in')) {
            $this->load->view('user/task_manager', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    public function delete_task()
    {
        $task_id = $this->input->get('task_id');
        $data = array(
            'status' => 5
        );
        $this->db->where('id', $task_id);
        $this->db->update('tasks',$data);
        $this->session->set_flashdata('task_deleted_success', 'Task deleted successfully' );
        redirect(base_url('dashboard/task-manager'));
    }

   
}
