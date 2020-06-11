<?php

class GraphTable extends Controller {

    public function index() {
        $user = $this->model('User');
        $this->view('graphTable/index');

    }


}