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
        $querry = "SELECT * FROM brfss WHERE data_id < 11";
        $result = mysqli_query($this->conn , $querry);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            return $result;
        }
        return "NO DATA FOUND!";
    }

    public function getAvailableAttribute($attribute) {
        $querry = "SELECT DISTINCT " . $attribute . " from brfss";
        $result = mysqli_query($this->conn , $querry);

        if($result == false) {
            $result = "NO DATA FOUND!";
            return $result;
        }

        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            return $result;
        }
        $result = "NO DATA FOUND!";
        return $result;
    }




    // public function connect(){
        
    //     $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

    //     return $this->conn;
    // }

}