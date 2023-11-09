<?php


class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('EventModel');
        $this->load->model('TimetableModel');
        $this->load->model('ExamModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'Events',
            'page' => 'Events'
        );
        $data['events'] = $this->EventModel->getAll();
        $this->load->view('student/events/view', $data);
    }
}
