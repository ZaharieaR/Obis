<?php

class TableChart extends Controller {

    private $model;

    public function index() {
        $user = $this->model('DataBase');
        $this->view('tableChart/index');
    }

    public function init() {
        $model = $this -> model("DataBase");
       
        $content = $model -> getInitContent();

        if($content == "NO DATA FOUND!") {
            echo "No data";
        } else {
            echo "<table style=" . "float:right;width:85%". ">
                    <tr>
                        <th>Data_id</th>
                        <th>Year</th>
                        <th>Locationabbr</th>
                        <th>Locationdesc</th>
                        <th>Response</th>
                        <th>Break_Out</th>
                        <th>Break_Out_Category</th>
                        <th>Sample_Size</th>
                        <th>Data_value</th>
                    </tr>";
        
            // while($row = mysqli_fetch_assoc($content)) { 
            //     echo "<tr>
            //             <td style=" . "text-align:center" . ">" . $content['data_id'] .   
            //             "<td style=" . "text-align:center" . ">" . $content['Year'] .
            //             "<td style=" . "text-align:center" . ">" . $content['Locationabbr'] .
            //             "<td style=" . "text-align:center" . ">" . $content['Locationdesc'] .
            //             "<td style=" . "text-align:center" . ">" . $content['Response'] .
            //             "<td style=" . "text-align:center" . ">" . $content['Break_Out'] .
            //             "<td style=" . "text-align:center" . ">" . $content['Break_Out_Category'] .
            //             "<td style=" . "text-align:center" . ">" . $content['Sample_Size'] .
            //             "<td style=" . "text-align:center" . ">" . $content['Data_value'] .
            //         "</tr>";
            // }

            echo "</table>";
        }
    }
}