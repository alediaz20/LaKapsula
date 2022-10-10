<?php
class cDataBase {
    private $dbUser;
	private $dbHost;
	private $dbPass;
	private $dbName;
	public $con;
	
	public function __construct($host, $user, $pass, $db){
		$this->dbHost = $host;
		$this->dbUser = $user;
		$this->dbPass = $pass;
		$this->dbName = $db;
	}
	
    
	public function connect(){
		$this->con = mysqli_connect($this->dbHost , $this->dbUser , $this->dbPass) or die(mysqli_error($this->con));
		mysqli_select_db($this->con, $this->dbName) or die(mysqli_error($this->con));
	}

    public function query($str_query){
		global $debug, $debugsql, $sitio;
	
		$result = mysqli_query($this->con, $str_query);
		return $result;
	}

    function create($table,$data){
        $sql = "INSER into `".$table."` (";
        foreach($data as $key =>$value){
            $sql.=$key.=",";
        }
        $sql = substr($sql,0,-1);
        $sql .= ") VALUES (";
        foreach ($data as $key=>$value){
            $sql.="'".$value."',";
        }
        $sql = substr($sql,0,-1);
        
        $result = $this->query($sql);
        return $result;
    }

    function edit($table,$data){
        $sql = "UPDATE `".$table."` SET ";
        
        foreach($data as $key => $value){
            $sql.="`".$key."`=`".$value."`, ";
        }
        $sql = substr($sql, 0, -1);

        $result = $this->query($sql);
        return $result;
    }

    function get($table){
        $sql = "SELEC * FROM `".$table."` ";

        $result = $this->query($sql);
        return $result;
    }

    function getById($table,$id){
        $sql = "SELEC * FROM `".$table."` WHERE `id`=".$id;

        $result = $this->query($sql);
        return $result;
    }
}
