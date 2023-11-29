<?php

class Oci extends Database
{
    public function __construct()
    {
        try {
            $this->dbh = oci_connect($this->user, $this->pass, $this->host . '/' . $this->service);
        } catch (\Throwable $e) {
            $msg = oci_error();
            die($e->getMessage());
        }

        oci_set_client_info($this->dbh, 'Administrator');
        // die("tessss");
        // // oci_set_module_name($this->dbh, 'Administrator');
        // // oci_set_client_info($this->dbh, 'Administrator');
    }

    public function query($query)
    {
        // $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    // public function executeOracle($data)
    // {
    //     $this->stmt->execute($data);
    // }

    // public function resultSet()
    // {
    //     $this->execute();
    //     return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function single()
    // {
    //     $this->execute();
    //     return $this->stmt->fetch(PDO::FETCH_ASSOC);
    // }

    // public function rowCount()
    // {
    //     return $this->stmt->rowCount();
    // }

    // public function beginTransaction()
    // {
    //     return $this->dbh->beginTransaction();
    // }

    // public function rollback()
    // {
    //     return $this->dbh->rollBack();
    // }

    // public function commit()
    // {
    //     return $this->dbh->commit();
    // }
}
