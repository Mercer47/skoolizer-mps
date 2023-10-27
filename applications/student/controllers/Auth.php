<?php class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function verify($qrCode)
    {
        $student = $this->AuthModel->getOne($qrCode);
        if (!empty($student)) {
            $isLoggedIn = array(
                'loggedIn' => true,
                'id' => $student->id,
                'name' => $student->Name,
                'class' => $student->Class,
                'rollNo' => $student->Rollno,
                'image' => $student->image
                );
            $this->session->set_userdata($isLoggedIn);
            redirect(site_url('student'));
        } else {
            exit('Page not found');
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(site_url('home'));
    }
}

?>