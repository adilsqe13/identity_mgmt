<?php
defined('BASEPATH') or exit('No direct script allowed');

class ArchiveTask extends CI_Controller
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
        $this->db->where('status', 0);
        $tasks = $this->db->get('tasks')->result();
        $data['tasks'] = $tasks;
        if ($this->session->userdata('user_logged_in')) {
            $this->load->view('user/archive_task', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    public function archive_task()
    {
        // $user_id = $this->session->userdata('user_id');
        $task_id = $this->input->get('task_id');
        $data = array(
            'status' => 0,
            'archive_date' => time()
        );
        $this->db->where('id', $task_id);
        $this->db->update('tasks', $data);
        $this->session->set_flashdata('task_archived_success', 'Task archived');
        redirect(base_url('dashboard/task-manager'));
    }


}
