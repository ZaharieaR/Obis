<?php

class TableChart extends Controller {

    private $model;

    public function index() {
        $user = $this->model('DataBase');
        $this->view('tableChart/index');
    }

    public function init() {
        $this->model = $this -> model("DataBase");
       
        $content = $this->model -> getInitContent();

        if($content == "NO DATA FOUND!") {
            echo "No data";
        } else {
            echo "<table>
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
        
            while($row = mysqli_fetch_assoc($content)) { 
                echo "<tr>
                        <td style=" . "text-align:center" . ">" . $row['data_id'] .   
                        "<td style=" . "text-align:center" . ">" . $row['Year'] .
                        "<td style=" . "text-align:center" . ">" . $row['Locationabbr'] .
                        "<td style=" . "text-align:center" . ">" . $row['Locationdesc'] .
                        "<td style=" . "text-align:center" . ">" . $row['Response'] .
                        "<td style=" . "text-align:center" . ">" . $row['Break_Out'] .
                        "<td style=" . "text-align:center" . ">" . $row['Break_Out_Category'] .
                        "<td style=" . "text-align:center" . ">" . $row['Sample_Size'] .
                        "<td style=" . "text-align:center" . ">" . $row['Data_value'] .
                    "</tr>";
            }
            echo "</table>";
        }
    }

    public function getFiltersContent() {
        echo "<form action=\"/Obis/public/tableChart/filtersApplyed\" method=\"get\">";

        $years = $this->model -> getAvailableAttribute("Year");
        if($years == "NO DATA FOUND!")
            echo "<br>";
        else {
            echo "<label for=\"Year\"> Choose an year: </label>
            <select name=\"Year\" id=\"Year\">";
            while($year = mysqli_fetch_assoc($years)) {
                echo "<option value=\"" . $year['Year'] . "\">" . $year['Year'] . "</option>";
            }
            echo "</select> <br>";
        }

        $locations = $this->model -> getAvailableAttribute("Locationdesc");
        if($locations == "NO DATA FOUND!")
            echo "<br>";
        else {
            echo "<label for=\"Location\"> Choose a location: </label>
            <select name=\"Location\" id=\"Location\" style=\"width:100px\">";
            while($location = mysqli_fetch_assoc($locations)) {
                echo "<option value=\"" . $location['Locationdesc'] . "\">" . $location['Locationdesc'] . "</option>";
            }
            echo "</select> <br>";
        }

        $responses = $this->model -> getAvailableAttribute("Respoense");
        if($responses == "NO DATA FOUND!")
            ;
        else {
            echo "<label for=\"Response\"> Choose a response: </label>
            <select name=\"Response\" id=\"Response\">";
            while($response = mysqli_fetch_assoc($responses)) {
                echo "<option value=\"" . $response['Response'] . "\">" . $response['Response'] . "</option>";
            }
            echo "</select> <br>";
        }

        $brkOutCategories = $this->model -> getAvailableAttribute("Break_Out_Category");
        if($brkOutCategories == "NO DATA FOUND!")
            echo "<br>";
        else {
            echo "<label for=\"BreakOutCategory\"> Choose a Category: </label>
            <select name=\"BreakOutCategory\" id=\"BreakOutCategory\">";
            while($brkOutCategorie = mysqli_fetch_assoc($brkOutCategories)) {
                echo "<option value=\"" . $brkOutCategorie['Break_Out_Category'] . "\">" . $brkOutCategorie['Break_Out_Category'] . "</option>";
            }
            echo "</select> <br>";
        }

        echo "<input type=\"submit\" value=\"Apply filters\">
            </form>";
        echo "getFiltersContent called";
    }

}