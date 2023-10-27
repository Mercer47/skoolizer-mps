<?php


class StudentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($id)
    {
        return
            $this->db->where('id', $id)
            ->get('student')->row();
    }

    public function getMarks($subject, $class, $rollno)
    {
        $sql = 'SELECT * FROM exam,conduct WHERE exam.Examcode=conduct.id AND conduct.Subject=? AND conduct.Class=? AND exam.Rollno=? ORDER BY conduct.Date desc';
        $query = $this->db->query($sql, array($subject, $class, $rollno));
        $row = $query->result();
        return $row;
    }

    function getResults($code, $roll)
    {
        $sql='SELECT * FROM exam WHERE Examcode=? AND Rollno=?';
        $query=$this->db->query($sql,array($code, $roll));
        $result=$query->result();
        return $result;
    }


}