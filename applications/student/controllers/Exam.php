<?php


class Exam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StudentModel');
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
            'title' => 'Exams',
            'page' => 'Exams'
        );
        $data['exams'] = $this->ExamModel->get($this->session->userdata('class'));
        $this->load->view('student/exams/view', $data);
    }

    public function results()
    {
        $data = array(
            'title' => 'Results',
            'page' => 'Results'
        );

        $class = $this->session->userdata('class');
        $rollNo = $this->session->userdata('rollNo');
        $data['exams'] = $this->ExamModel->getDistinct($this->session->userdata('class'));
        $this->load->view('student/exams/results/select', $data);
    }

    public function displayResult($subject)
    {
        $class = $this->session->userdata('class');
        $rollNo = $this->session->userdata('rollNo');
        $name = $this->session->userdata('name');
        $data['exams'] = $this->ExamModel->getAllExamsBySubjectAndClass($subject, $class);
        $data['marks'] = $this->ExamModel->getMarks($data['exams'], $rollNo, $name);
        $this->load->view('student/exams/results/view', $data);
    }
}