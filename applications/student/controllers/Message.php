<?php


class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('MessageModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Messages',
            'page' => 'Messages'
        );

        $data['messages'] = $this->MessageModel->get($this->session->userdata('id'));
        $this->load->view('student/messages/view', $data);
    }

}