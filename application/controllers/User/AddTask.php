<?php
defined('BASEPATH') or exit('No direct script allowed');

class AddTask extends CI_Controller
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
        $this->db->where('id', $user_id);
        $tasks = $this->db->get('tasks')->result();
        $data['tasks'] = $tasks;
        if ($this->session->userdata('user_logged_in')) {
            $this->load->view('user/add_task', $data);
        } else {
            redirect(base_url('login'));
        }
    }

    public function add_task()
    {
        $post = $this->input->post();
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'task_name' => $post['task_name'],
            'description' => $post['description'],
            'added_date' => time()
        );

        // Insert the data using the model
        if ($this->db->insert('tasks', $data)) {
            $this->session->set_flashdata('task_added_success', 'New task added successfully');
            redirect(base_url('dashboard/task-manager'));
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect(base_url('dashboard/task-manager/add-task'));
        }
    }

   
}
