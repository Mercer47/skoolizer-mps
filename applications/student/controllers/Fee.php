<?php


class Fee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('FeeModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Fee',
            'page' => 'Fee'
        );

        $student = array(
            'name' => $this->session->userdata('name'),
            'class' => $this->session->userdata('class'),
            'rollNo' => $this->session->userdata('rollNo')
        );

        $data['payments'] = $this->FeeModel->get($student);
        $this->load->view('student/fee/view', $data);
    }
}