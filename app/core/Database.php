<?php

class Database
{
	protected $host = DB_HOST;
	protected $user = DB_USER;
	protected $pass = DB_PASS;
	protected $service = DB_SERVICE;

	protected $dbh;
	protected $stmt;

	public function __construct()
	{
		try {
			$this->dbh = oci_connect($this->user, $this->pass, $this->host . '/' . $this->service);
		} catch (\Throwable $e) {
			$msg = oci_error();
			die($e->getMessage());
		}

		oci_set_client_info($this->dbh, 'Administrator');
	}

	public function query($query)
	{
		$this->stmt = oci_parse($this->dbh, $query);
	}

	public function resultSet()
	{
		oci_execute($this->stmt);
		oci_fetch_all($this->stmt, $res, 0, -1, OCI_FETCHSTATEMENT_BY_ROW + OCI_ASSOC);

		return $res;
	}

	public function __destruct()
	{
		if ($this->stmt) {
			oci_free_statement($this->stmt);
		}

		if ($this->dbh) {
			oci_close($this->dbh);
		}
	}
}
