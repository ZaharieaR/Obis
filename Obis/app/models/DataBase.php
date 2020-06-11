<?php

class Database{
    private $host = 'localhost';
    private $username = 'root'; 
    private $password= '';
    private $db_name = 'twdb';
    private $conn;

    public function __construct(){
        
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);

    }

    public function getConnection() {
        return $this->conn;
    }

    public function getInitContent($query_arr) {
        $querry = "SELECT * FROM brfss WHERE 1 ";
        $querry = "SELECT * FROM brfss WHERE 1";
        if($query_arr["Year"] != "None")
            $querry = $querry . " AND Year = '" . $query_arr["Year"] . "'";

        if($query_arr["Location"] != "None")
            $querry = $querry . " AND Locationdesc = '" . $query_arr["Location"] . "'";

        if($query_arr["Response"] != "None")
            $querry = $querry . " AND Response = '" . $query_arr["Response"] . "'";

        if($query_arr["BreakOutCategory"] != "None")
            $querry = $querry . " AND Break_Out_Category = '" . $query_arr["BreakOutCategory"] . "'";

        if($query_arr["BreakOut"] != "None")
            $querry = $querry . " AND Break_Out = '" . $query_arr["BreakOut"] . "'";

        $offset = ($query_arr["page"] - 1) * 30;
        $querry = $querry . " LIMIT 30 OFFSET " . $offset;
        
        $result = mysqli_query($this->conn , $querry);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0) {
            return $result;
        }
        return "NO DATA FOUND!";
    }

    public function getAvailableBreakOutValues($brkCategory) {
        $querry = "SELECT DISTINCT Break_Out FROM brfss WHERE Break_Out_Category = '$brkCategory'";
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
}