<?php

class TableChart extends Controller {

    private $model;
    private $query_arr;

    public function __construct() {
        $url = $_SERVER['REQUEST_URI'];
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $this->query_arr);
    }

    public function index() {
        $this->view('tableChart/index');
    }

    public function init() {

        $content = $this->model -> getInitContent($this->query_arr);
        if($content == "NO DATA FOUND!") {
            echo "No data";
        } else {
            echo " <div class= \"TabelComplet\">";
            echo "<table  class=\"chartTabel\">
                    <tr>
                        <td>Data_id</td>
                        <td>Year</td>
                        <td>Locationabbr</td>
                        <td>Locationdesc</td>
                        <td>Response</td>
                        <td>Break_Out</td>
                        <td>Break_Out_Category</td>
                        <td>Sample_Size</td>
                        <td>Data_value</td>
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
        $aux = $this->query_arr;
        $aux['page'] = $this->query_arr['page'] + 1;
        $contentNextPage = $this->model -> getInitContent($aux);

        $aux2 = $this->query_arr;
        $aux2['page'] = $this->query_arr['page'] - 1;
        $contentPrevPage = $this->model -> getInitContent($aux2);
        if($contentPrevPage == "No DATA FOUND!" && $contentNextPage == "No DATA FOUND!") {
            ;
        } else {
            echo "<div class=\"pageButtons\">";
            if($contentPrevPage != "NO DATA FOUND!") {
                echo "<p onclick=\"prevPage()\"> <-- Previous page </p>";
            }
            if($contentNextPage != "NO DATA FOUND!") {
                echo "<p onclick=\"nextPage()\"> Next page --> </p>";
            }
            echo "</div>";
        }
        echo "</div>";
    }

    public function getFiltersContent() {
        $this->model = $this -> model("DataBase");

        $years = $this->model -> getAvailableAttribute("Year");
        if($years == "NO DATA FOUND!")
            echo "<br>";
        else {
            echo "<br><label for=\"Year\"> Choose an year: </label>
            <select name=\"Year\" id=\"Year\">
            <option value=\"None\"> None </option>";
            while($year = mysqli_fetch_assoc($years)) {
                if($year['Year'] == $this->query_arr['Year'])
                    echo "<option selected value=\"" . $year['Year'] . "\">" . $year['Year'] . "</option>";
                else
                    echo "<option value=\"" . $year['Year'] . "\">" . $year['Year'] . "</option>";
            }
            echo "</select> <br>";
        }

        $locations = $this->model -> getAvailableAttribute("Locationdesc");
        if($locations == "NO DATA FOUND!")
            echo "<br>";
        else {
            echo "<label for=\"Location\"> Choose a location: </label>
            <select name=\"Location\" id=\"Location\">
            <option value=\"None\"> None </option>";
            while($location = mysqli_fetch_assoc($locations)) {
                if($location['Locationdesc'] == $this->query_arr['Location'])
                    echo "<option selected value=\"" . $location['Locationdesc'] . "\">" . $location['Locationdesc'] . "</option>";
                else
                    echo "<option value=\"" . $location['Locationdesc'] . "\">" . $location['Locationdesc'] . "</option>";
            }
            echo "</select> <br>";
        }


        $responses = $this->model -> getAvailableAttribute("Response");
        if($responses == "NO DATA FOUND!")
            ;
        else {
            echo "<label for=\"Response\"> Choose a response: </label>
            <select name=\"Response\" id=\"Response\">
            <option value=\"None\"> None </option>";
            while($response = mysqli_fetch_assoc($responses)) {
                if($response['Response'] == $this->query_arr['Response'])
                    echo "<option selected value=\"" . $response['Response'] . "\">" . $response['Response'] . "</option>";
                else
                    echo "<option value=\"" . $response['Response'] . "\">" . $response['Response'] . "</option>";
            }
            echo "</select> <br>";
        }

        $brkOutCategories = $this->model -> getAvailableAttribute("Break_Out_Category");
        if($brkOutCategories == "NO DATA FOUND!")
            echo "<br>";
        else {
            echo "<label for=\"BreakOutCategory\"> Choose a Category: </label>
            <select name=\"BreakOutCategory\" id=\"BreakOutCategory\">
            <option value=\"None\"> None </option>";
            while($brkOutCategorie = mysqli_fetch_assoc($brkOutCategories)) {
                if($brkOutCategorie['Break_Out_Category'] == $this->query_arr['BreakOutCategory'])
                    echo "<option selected value=\"" . $brkOutCategorie['Break_Out_Category'] . "\">" . $brkOutCategorie['Break_Out_Category'] . "</option>";
                else
                    echo "<option value=\"" . $brkOutCategorie['Break_Out_Category'] . "\">" . $brkOutCategorie['Break_Out_Category'] . "</option>";
            }
            echo "</select> <br> ";
        }
    }

    public function getBrkOutFilterContent() {
        $breakOutSelected = $this->query_arr["BreakOutCategory"];

        $brkOut = $this->model->getAvailableBreakOutValues($breakOutSelected);
        if($brkOut == "NO DATA FOUND!")
            ;
        else {
            echo "<label for=\"BreakOut\"> Choose a Break Out: </label>
            <select name=\"BreakOut\" id=\"BreakOut\">
            <option value=\"None\"> None </option>";
            while($brk = mysqli_fetch_assoc($brkOut)) {
                if($brk['Break_Out'] == $this->query_arr['BreakOut'])
                    echo "<option selected value=\"" . $brk['Break_Out'] . "\">" . $brk['Break_Out'] . "</option>";
                else
                echo "<option value=\"" . $brk['Break_Out'] . "\">" . $brk['Break_Out'] . "</option>";
            }
            echo "</select> <br>";
        }
    }

}