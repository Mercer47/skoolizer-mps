<?php


class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
        $this->load->model('PostModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
    }

    public function mySchool()
    {
        $data = array(
            'title' => 'My School',
            'page' => 'My School'
        );
        $data['posts'] = $this->PostModel->get('school');
        $this->load->view('student/posts/view', $data);
    }

    public function myClass()
    {
        $data = array(
            'title' => 'My Class',
            'page' => 'My Class'
        );
        $data['posts'] = $this->PostModel->get($this->session->userdata('class'));
        $this->load->view('student/posts/view', $data);
    }
}