<?php

class QuestionModel
{

	private $db;
	private $table = 'hr_angket';

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllData()
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' order by NO');
		return $this->db->resultSet();
	}

	// public function searchBookMark($data)
	// {
	// 	// var_dump($data);
	// 	$this->db->query('CALL sp_getBookMark("'. $data['search'] .'")');

	// 	// $json = json_encode($this->db->resultSet());

	// 	// echo $json;
	// 	return $this->db->resultSet();
	// }
}
