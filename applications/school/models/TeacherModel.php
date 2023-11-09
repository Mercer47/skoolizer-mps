<?php


class TeacherModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAll() //get all teachers
	{
		$query=$this->db->query('SELECT * FROM teachers');
		$result=$query->result();
		return $result;
	}

	public function insert($data, $empdata) //insert
	{
		$this->db->insert('employees', $empdata);
		$id = $this->db->insert_id();
		$data['empid'] = $id;
		if ($this->db->insert('teachers', $data)) {
			$this->db->where('id', $this->db->insert_id());
			$teacher = $this->db->get('teachers')->first_row();
			return $teacher;
		} else {
			return false;
		}
	}

	public function profile($id) //teacher profile
	{
		$sql='SELECT * FROM teachers WHERE id=?';
		$query=$this->db->query($sql,$id);
		$result=$query->result();
		return $result;
	}

	public function update($data, $id) //update teacher
	{
		$this->db->where('id', $id);
		if ($this->db->update('teachers', $data)) {
			return true;
		} else {
			return false;
		}
	}




	public function delete($id)  //delete teacher
	{
		$this->db->where('id', $id);
		$this->db->select('empid');
		$query = $this->db->get('teachers');
		$result = $query->result_array();
		$empId = $result['empid'];

		$this->db->where('id', $empId);
		$this->db->delete('employees');

		$this->db->where('id', $id);
		if ($this->db->delete('teachers')) {
			return true;
		} else {
			return false;
		}
	}

	public function checkIfCodeUnique($content)
	{
		$sql = "SELECT * FROM teachers WHERE qrcode = ?";
		$query = $this->db->query($sql, $content);
		$rowCount = $query->num_rows();
		return $rowCount > 0 ? false : true;
	}

}
