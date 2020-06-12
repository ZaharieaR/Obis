<?php

class api extends Controller {

    private $dbModel;

    public function index() {
        echo "index api";
    }
    

    public function getPieChartData() {
        $dbModel = $this->model('DataBase');

        $locations = $dbModel-> getAvailableAttribute("Locationdesc");
        
        $json = "[";

        while($row = mysqli_fetch_assoc($locations)) {
            $json .= "{\"Location\":\"". $row['Locationdesc'] . "\"},";
            // echo "{Location:" . $row['Locationdesc'] . "},";
        }
        $json = substr($json, 0, -1);
        $json .= "]";

        echo $json;

        // $data_id = 4;
        // $content = $dbModel -> getSemple_Size($data_id);
        // while($row = mysqli_fetch_assoc($content)) { 
        //     $sample = $row['Sample_Size'];
        //     $data = $row['Data_value'];
        //     $retVal = ($data / 100) * $sample;
        //     echo "$retVal";
            // echo "<tr>
                //     <td style=" . "text-align:center" . ">" . $row['data_id'] .   
                //     "<td style=" . "text-align:center" . ">" . $row['Year'] .
                //     "<td style=" . "text-align:center" . ">" . $row['Locationabbr'] .
                //     "<td style=" . "text-align:center" . ">" . $row['Locationdesc'] .
                //     "<td style=" . "text-align:center" . ">" . $row['Response'] .
                //     "<td style=" . "text-align:center" . ">" . $row['Break_Out'] .
                //     "<td style=" . "text-align:center" . ">" . $row['Break_Out_Category'] .
                //     "<td style=" . "text-align:center" . ">" . $row['Sample_Size'] .
                //     "<td style=" . "text-align:center" . ">" . $row['Data_value'] .
                // "</tr>";
        // }
    }

}

?>