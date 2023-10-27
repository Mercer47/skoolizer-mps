<?php
/**
 * 
 */
class Student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('StudentModel');
        $this->load->model('MovementModel');
        $this->load->model('TimetableModel');
        if (!($_SESSION['loggedIn'])) {
            session_destroy();
            redirect(site_url('auth'));
        }
	}
	

	public function index()
	{
	    $data = array(
	        'title' => 'Dashboard',
            'page' => 'Home'
        );
	    $data['mostRecentMovement'] = $this->MovementModel->mostRecent($this->session->userdata('id'));
	    $data['scheduleList'] = $this->TimetableModel->getByClass($this->session->userdata('class'));
	    $this->load->view('student/home', $data);
	}

    public function profile()
    {
        $data = array(
            'title' => 'Profile',
            'page' => 'Profile'
        );
        $id = $this->session->userdata('id');
        $data['student'] = $this->StudentModel->get($id);
        $this->load->view('student/profile/view', $data);
    }




}
 
?>