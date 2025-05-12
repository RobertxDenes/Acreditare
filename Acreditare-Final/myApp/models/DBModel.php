<?php

class DBModel
{
	// host, user, passw, database
	protected $conn;
	public function db()
	{
		try {
			$this->conn = new mysqli('localhost', 'myuser', '123', 'webdev');
		} catch (Exception $e) {
			if ($e->getMessage())
				die("Error: " . $e->getMessage());
		}
		return $this->conn;
	}
}