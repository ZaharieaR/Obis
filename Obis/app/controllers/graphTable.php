<?php

class GraphTable extends Controller {

    private $query_arr;

    public function index() {
        $user = $this->model('User');
        $this->view('graphTable/index');
    }

    public function __construct() {
        $url = $_SERVER['REQUEST_URI'];
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $this->query_arr);
    }

    public function getFilterOf($categorie) {
        $this->model = $this -> model("DataBase");

        $content = $this->model->getAvailableAttribute($categorie);
        if($content == "NO DATA FOUND!") {
            echo "NO DATA FOR THIS FILTER<br>";
        } else {
            echo "<label for=" . $categorie . "> " . $categorie . " filter: </label>
            <select name=" . $categorie . " id=" . $categorie . ">
            <option value=\"None\"> None </option>";
            
            while($row = mysqli_fetch_assoc($content)) {
                if($row[$categorie] == $this->query_arr[$categorie])
                    echo "<option selected value=\"" . $row[$categorie] . "\">" . $row[$categorie] . "</option>";
                else
                    echo "<option value=\"" . $row[$categorie] . "\">" . $row[$categorie] . "</option>";
            }
            echo "</select> <br>";
        }
    }

    public function getBrkOutFilterContent() {
        $breakOutSelected = $this->query_arr["Break_Out_Category"];

        $brkOut = $this->model->getAvailableBreakOutValues($breakOutSelected);
        if($brkOut == "NO DATA FOUND!")
            ;
        else {
            echo "<label for=\"BreakOut\"> Choose a Break Out: </label>
            <select name=\"Break_Out\" id=\"Break_Out\">
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