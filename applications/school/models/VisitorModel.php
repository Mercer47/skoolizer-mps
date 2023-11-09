<?php


class VisitorModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        return $this->db->get('visitors')->result();
    }

    public function insert($visitor)
    {
        return $this->db->insert('visitors', $visitor) ? true: false;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('visitors') ? true : false;
    }
}