<?php

class SurveyTamuModel
{

    private $db;
    private $table = 'hr_kepuasanpelanggan';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function saveData($data)
    {
        $query = "INSERT INTO hr_kepuasanpelanggan (TANGGAL, PELAYANAN, HIDANGAN, KEBERSIHAN, FASILITAS, ID) 
        VALUES(TO_DATE(:inputdate, 'ddmmyyyy'), :pelayanan, :hidangan, :kebersihan, :fasilitas, :id)";

        $this->db->query($query);

        $_POSTMOD['inputdate'] = date('dmY');
        $_POSTMOD['pelayanan'] = $data['pelayanan'];
        $_POSTMOD['hidangan'] = $data['hidangan'];
        $_POSTMOD['kebersihan'] = $data['kebersihan'];
        $_POSTMOD['fasilitas'] = $data['fasilitas'];
        $_POSTMOD['id'] = time();

        // $this->db->bind('inputdate', strtoupper(date('d-M-y')));
        // $this->db->bind('pelayanan', $data['pelayanan']);
        // $this->db->bind('hidangan', $data['hidangan']);
        // $this->db->bind('kebersihan', date('kebersihan'));
        // $this->db->bind('fasilitas', $data['fasilitas']);
        // $this->db->bind('ids', $this->createIds() + 1);
        $this->db->executeOracle($_POSTMOD);

        return $this->db->rowCount();
    }

    public function getDataByDate($date)
    {
        $reqDate = date_create_from_format("m/d/Y", $date);
        $reqDate = strtoupper(date_format($reqDate, 'd-M-y'));
        $this->db->query("SELECT * FROM " . $this->table . " WHERE TANGGAL ='" . $reqDate . "'");
        return $this->db->resultSet();
    }

    public function getDataByDateRange($data)
    {
        $startDateRaw = date_create_from_format("d-m-Y", substr($data[1], 0, 10));
        $endDateRaw = date_create_from_format("d-m-Y", $data[2]);

        $startDate = date_format($startDateRaw, 'dmY');
        $endDate = date_format($endDateRaw, 'dmY');

        $query = "select 
                    SUM(CASE WHEN pelayanan='0' THEN 1 ELSE 0 END ) pelayanan_tidakpuas,
                    SUM(CASE WHEN pelayanan='1' THEN 1 ELSE 0 END ) pelayanan_cukuppuas,
                    SUM(CASE WHEN pelayanan='2' THEN 1 ELSE 0 END ) pelayanan_puas,
                    SUM(CASE WHEN HIDANGAN='0' THEN 1 ELSE 0 END ) HIDANGAN_tidakpuas,
                    SUM(CASE WHEN HIDANGAN='1' THEN 1 ELSE 0 END ) HIDANGAN_cukuppuas,
                    SUM(CASE WHEN HIDANGAN='2' THEN 1 ELSE 0 END ) HIDANGAN_puas,
                    SUM(CASE WHEN FASILITAS='0' THEN 1 ELSE 0 END ) FASILITAS_tidakpuas,
                    SUM(CASE WHEN FASILITAS='1' THEN 1 ELSE 0 END ) FASILITAS_cukuppuas,
                    SUM(CASE WHEN FASILITAS='2' THEN 1 ELSE 0 END ) FASILITAS_puas,
                    SUM(CASE WHEN KEBERSIHAN='0' THEN 1 ELSE 0 END ) KEBERSIHAN_tidakpuas,
                    SUM(CASE WHEN KEBERSIHAN='1' THEN 1 ELSE 0 END ) KEBERSIHAN_cukuppuas,
                    SUM(CASE WHEN KEBERSIHAN='2' THEN 1 ELSE 0 END ) KEBERSIHAN_puas                
                from hr_kepuasanpelanggan
                where TANGGAL between TO_DATE('" . $startDate . "', 'ddmmyyyy') AND TO_DATE('" .  $endDate . "', 'ddmmyyyy') group by tanggal";

        $this->db->query($query);
        return $this->db->resultSet();
    }
}
