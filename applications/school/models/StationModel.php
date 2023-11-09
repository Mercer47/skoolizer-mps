<?php


class StationModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function load($id) //load stations
	{
		$sql = 'SELECT * FROM stations WHERE RouteId=?';
		$query = $this->db->query($sql, $id);
		$result = $query->result();
		return $result;
	}

	public function insert($data)  //insert stations
	{
		return $this->db->insert('stations', $data) ? true : false;
	}

	public function delete($id) //delete station
	{
		$this->db->where('id', $id);
		$this->db->delete('stations');

		$data = array(
			'Passengerid' => null
		);
		$query = $this->db->get_where('passengers', array('Stationid' => $id));
		foreach ($query->result() as $row) {
			$this->db->where('Passengerid', $row->id);
			$this->db->update('student', $data);
		}

		$this->db->where('Stationid', $id);
		return $this->db->delete('passengers') ? true : false;
	}

}
