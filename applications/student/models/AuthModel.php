<?php


class AuthModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getOne($qrCode)
    {
        return $this->db
            ->where('qrcode', $qrCode)
            ->get('student')
            ->row();
    }

    public function verify($email, $password)
    {
        $student = $this->db->where('Email', $email)->get('student')->row();
        return password_verify($password, $student->Password) ? $student : false;
    }
}