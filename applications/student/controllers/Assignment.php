<?php


class Assignment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('TimetableModel');
        $this->load->model('AssignmentModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }
    public function index()
    {
        $data = array(
            'title' => 'Assignments',
            'page' => 'Assignments'
        );
        $this->load->view('student/assignments/select', $data);
    }

    public function display($date)
    {
        $data['assignments'] = $this->AssignmentModel->get($this->session->userdata('class'), $date);
        $this->load->view('student/assignments/list', $data);
    }
}