<?php

class MySQL{
    private $sname;
    private $uname;
    private $pword;
    private $db_name;
    public $conn;
    
    public function __construct () {
        $this->sname = "localhost";
$this->uname = "root";
$this->pword = "root123";
$this->db_name = "newAttendance";
         $this->conn = mysqli_connect($this->sname, $this->uname, $this->pword, $this->db_name, 8111);
    }

    public function close() {
        $this->conn->close();
    }
    

}

?>