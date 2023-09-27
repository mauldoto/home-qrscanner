<?php

class AngketModel
{

    private $db;
    private $table = 'hr_angket';
    private $tableJawaban = 'hr_angket_jawaban';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' order by NO');
        return $this->db->resultSet();
    }

    public function getArrayData()
    {
        $arrMod = [];
        $array = $this->getAllData();

        foreach ($array as $key => $angket) {
            if ($angket['P0'] === "A. Pertanyaan untuk di jawab Kepala Afdeling") {
                if (!isset($arrMod[0])) {
                    $arrMod[0] = [];
                }

                array_push($arrMod[0], $angket);
            } else {
                if (!isset($arrMod[1])) {
                    $arrMod[1] = [];
                }

                array_push($arrMod[1], $angket);
            }
        }

        return $arrMod;
    }

    public function getJawaban($nik)
    {
        $this->db->query("SELECT * FROM " . $this->tableJawaban . " WHERE NIK='" . $nik . "'");
        return $this->db->resultSet();
    }

    public function saveData($data)
    {
        if (count($this->check($data['nik'])) > 0) {
            $query = "UPDATE hr_angket_jawaban set JAWABAN=:jawaban, INPUTDATE=:inputdate, ALASAN=:alasan WHERE NIK=:nik and NO=:no";
        } else {
            $query = "INSERT INTO hr_angket_jawaban (NIK, NO, JAWABAN, INPUTDATE, ALASAN) 
            VALUES(:nik, :no, :jawaban, TO_DATE(:inputdate, 'ddmmyyyy'), :alasan)";
        }

        $data['inputdate'] = date('dmY');

        $this->db->query($query);

        // $this->db->bind('nik', $data['nik']);
        // $this->db->bind('no', $data['no']);
        // $this->db->bind('jawaban', $data['jawaban']);
        // $this->db->bind('inputdate', date('dmY'));
        // $this->db->bind('alasan', $data['alasan']);
        $this->db->executeOracle($data);

        return $this->db->rowCount();
    }

    public function saveDataMultipleRow($dataPOST)
    {
        try {
            $data['angket'] = $this->getAllData();
            $delete = '';
            $query = "INSERT INTO hr_angket_jawaban (NIK, NO, JAWABAN, INPUTDATE, ALASAN) 
                VALUES(:nik, :no, :jawaban, TO_DATE(:inputdate, 'ddmmyyyy'), :alasan)";

            $this->db->beginTransaction();

            if (count($this->check($dataPOST['nik'])) > 0) {
                // $queryDelete = "UPDATE hr_angket_jawaban set JAWABAN=:jawaban, INPUTDATE=:inputdate, ALASAN=:alasan WHERE NIK=:nik and NO=:no";
                $queryDelete = "DELETE FROM " . $this->tableJawaban . " WHERE NIK='" . $dataPOST['nik'] . "'";
                $delete = $this->db->query(($queryDelete));
                $this->db->execute();
            }

            $this->db->query($query);

            foreach ($data['angket'] as $key => $angket) {
                $_POSTMOD['nik'] = $dataPOST['nik'];
                $_POSTMOD['no'] = $angket['NO'];
                $_POSTMOD['jawaban'] = isset($dataPOST['angket_' . $angket['NO']]) ? $dataPOST['angket_' . $angket['NO']] : '';
                $_POSTMOD['alasan'] = isset($dataPOST['alasan_angket_' . $angket['NO'] . $_POSTMOD['jawaban']]) ? $dataPOST['alasan_angket_' . $angket['NO'] . $_POSTMOD['jawaban']] : '';
                $_POSTMOD['inputdate'] = date('dmY');

                $this->db->executeOracle($_POSTMOD);

                if ($_POSTMOD['no'] == 1 && $_POSTMOD['jawaban'] == 'b') {
                    break;
                }
            }

            $this->db->commit();
        } catch (\Throwable $th) {
            $this->db->rollback();
            throw $th;
        }

        // $this->db->bind('nik', $data['nik']);
        // $this->db->bind('no', $data['no']);
        // $this->db->bind('jawaban', $data['jawaban']);
        // $this->db->bind('inputdate', date('dmY'));
        // $this->db->bind('alasan', $data['alasan']);
        // $this->db->executeOracle($data);

        return $this->db->rowCount();
    }

    public function check($nik)
    {
        $this->db->query("SELECT NIK FROM " . $this->tableJawaban . " WHERE NIK='" . $nik . "'");
        return $this->db->resultSet();
    }
}
