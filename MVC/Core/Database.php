<?php  
	class Database{
		private $host = "localhost";
		private $dbName = "db_admin";
		private $username = 'root';
		private $password = 'root';

		public $conn;

		public function __construct(){
			$this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbName);
			mysqli_query($this->conn, "SET NAMES 'utf8'");
		}
	}

?>