<?php

class HomeQrScanner
{

    private $db;
    private $table = 'v_penghunirumah';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPenghuniRumah($data)
    {
        $kodeRumah = explode("=", $data[0])[1];
        $noPintu = explode("=", $data[1])[1];

        $query = "select 
                    KODERUMAH,NAMARUMAH,NOPINTU,INDUK_NIK,INDUK_NAME,INDUK_JABATAN,FOTO1
                    from v_penghunirumah where KODERUMAH = '" . $kodeRumah . "'
                    and NOPINTU=" . $noPintu . "
                    group by KODERUMAH,NAMARUMAH,NOPINTU,INDUK_NIK,INDUK_NAME,INDUK_JABATAN,FOTO1";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getDetailPenghuni($data)
    {
        $kodeRumah = $data[0];
        $noPintu = $data[1];

        $query = "select nopintu,
                    FAMILY_NAME,JENKEL,KET,UMUR,FOTO1,FOTO2
                    from v_penghunirumah where KODERUMAH = '" . $kodeRumah . "'
                    and NOPINTU=" . $noPintu;

        $this->db->query($query);
        return $this->db->resultSet();
    }
}
