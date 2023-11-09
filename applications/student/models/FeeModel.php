<?php


class FeeModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get(array $student)
    {
        return $this->db
            ->where('studentname', $student['name'])
            ->where('class', $student['class'])
            ->where('rollno', $student['rollNo'])
            ->order_by('created_at', 'desc')
            ->get('fee')
            ->result();
    }
}