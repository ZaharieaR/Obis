<?php

class Database{
    private $host = 'localhost';
    private $username = 'root'; 
    private $password= '';
    private $db_name = 'obisdb';
    private $conn;

    private $dataId;
    private $year;
    private $locationAbbr;
    private $locationDesc;
    private $response;
    private $breakOut;
    private $breakOutCategory;
    private $sampleSize;
    private $dataValue;


    public function __construct(){
        
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

    }

    public function getConnection() {
        return $this->conn;
    }

    public function getInitContent() {
        $sql = "SELECT * FROM brfss WHERE data_id < 100";
        $result = mysqli_query($this->conn , $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            return $result;
        }
        return "NO DATA FOUND!";
    }




    // public function connect(){
        
    //     $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

    //     return $this->conn;
    // }

}