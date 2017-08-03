<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "ojt";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>


<?php
date_default_timezone_set('Asia/Jakarta');

class koneksi {
	private $db_host = 'localhost';
	private $db_root = 'root';
	private $db_pass = '';
	private $db_base = 'ojt';

	public $db;
	private $stmt;
	private $errDB;

	public function __construct() {
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		try {
			$this->db = new PDO( "mysql:host={$this->db_host};dbname={$this->db_base}", $this->db_root, $this->db_pass, $options);
		} catch( PDOException $e ) {
			echo $errDB = $e->getMessage();
			exit();
		}
	}

	public function __destruct() {
		$this->db = null;
	}

	public function query( $sql ) {
		$this->stmt = $this->db->prepare($sql);
	}

	public function bind( $param, $value, $type = null ) {
		if ( is_null($type) === true ) {
			switch (true) {
				case is_int( $value ):
					$type = PDO::PARAM_INT;
					break;
				case is_bool( $value ):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null( $value ):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue( $param, $value, $type );
	}

	public function execute() {
		return $this->stmt->execute();
	}

	public function fetchAll() {
		$this->execute();
		return $this->stmt->fetchAll( PDO::FETCH_OBJ );
	}

	public function fetch() {
		$this->execute();
		return $this->stmt->fetch( PDO::FETCH_OBJ );
	}

	public function rowCount() {
		return $this->stmt->rowCount();
	}

	public function lastInsertId() {
		return $this->db->lastInsertId();
	}

	public function beginTransaction() {
		return $this->db->beginTransaction();
	}

	public function endTransaction() {
		return $this->db->commit();
	}

	public function cancelTransaction() {
		return $this->db->rollBack();
	}

	public function debugDumpParams() {
		return $this->stmt->debugDumpParams();
	}
}