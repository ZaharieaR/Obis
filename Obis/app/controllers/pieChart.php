<?php

class PieChart extends Controller {

    public function index() {
        $user = $this->model('User');
        $this->view('pieChart/index');

    }

}