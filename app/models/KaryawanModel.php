<?php

class KaryawanModel
{
    private $db;
    private $table = 'empmasterepms';
    private $tablePosition = 'mas_position';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' order by NO');
        return $this->db->resultSet();
    }

    public function getSearchData($search)
    {
        $query = strtoupper($search);
        $this->db->query("SELECT empcode, empname FROM " . $this->table . " WHERE empcode LIKE '%" . $query . "%' OR empname LIKE '%" . $query . "%'");
        $results = $this->db->resultSet();

        $results = array_map(function ($result) {
            return [
                "id"    => $result['EMPCODE'],
                "text"  => $result['EMPCODE'] . ' - ' . $result['EMPNAME']
            ];
        }, $results);

        return $results;
    }

    public function getDetail($nik)
    {
        $nik = strtoupper($nik);
        $this->db->query("SELECT empcode, empname, job.description jabatan FROM " . $this->table . " emp, " . $this->tablePosition . " job WHERE emp.id_position = job.code and empcode='" . $nik . "'");
        $result = $this->db->single();

        return $result;
    }
}
