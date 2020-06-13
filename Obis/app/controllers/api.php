<?php

class api extends Controller {

    private $dbModel;

    public function getPieChartData() {
        $dbModel = $this->model('DataBase');
        $url = $_SERVER['REQUEST_URI'];
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $query_arr);

        $locations = $dbModel-> getAvailableAttribute("Locationdesc");
        $json = "[";

        while($row = mysqli_fetch_assoc($locations)) {
            
            $dbResult = $dbModel-> getSampleAndDataValue($row['Locationdesc'], $query_arr["Year"], 
                                         $query_arr["Response"],  $query_arr["Break_Out_Category"], $query_arr["Break_Out"]);
            if($dbResult != "NO DATA") {
                $json .= "{\"Location\":\"". $row['Locationdesc'] . "\"";
                while($row2 = mysqli_fetch_assoc($dbResult)){
                    $json .= ",\"SampleSize\":\"" . $row2["Sample_Size"] . "\",\"DataValue\":\"" . $row2["Data_value"] . "\"},";
                }
            } 
        }
        $json = substr($json, 0, -1);
        $json .= "]";

        echo $json;
    }

}

?>