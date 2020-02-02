<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "ebiblioteka";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

		function unesiRadnika($pod) {
			$mysqli = new mysqli("localhost", "root", "", "ebiblioteka");

			$user = trim($pod['username']);
	    $pass = trim($pod['password']);
	    $ime = trim($pod['imePrezime']);
	    $uloga = trim($pod['uloga']);
	    $upit = "INSERT INTO radnik(imePrezime,username,password,ulogaID) VALUES ('$ime','$user','$pass',$uloga)";
			$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
			fwrite($myfile, $upit);
			if($mysqli->query($upit))
			{
				$this ->result = true;
			}
			else
			{
				$this->result = false;
			}
			$mysqli->close();
		}


	function vratiUloge() {
	  $mysqli = new mysqli("localhost", "root", "", "ebiblioteka");
	  $upit = 'SELECT * FROM uloga';
	  $this ->result = $mysqli->query($upit);
	  $mysqli->close();
	}

	function vratiJednogClana($id) {
	  $mysqli = new mysqli("localhost", "root", "", "ebiblioteka");
	  $q = 'SELECT * FROM clan c where c.clanID='.$id;
	  $this ->result = $mysqli->query($q);
	  $mysqli->close();
	}
	function vratiClanove() {
	  $mysqli = new mysqli("localhost", "root", "", "ebiblioteka");
	  $q = 'SELECT * FROM clan';
	  $this ->result = $mysqli->query($q);
	  $mysqli->close();
	}



	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
