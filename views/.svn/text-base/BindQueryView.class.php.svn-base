<?php

class BindQueryView extends View {
    private $model;
    private $controller;

    public function __construct(Controller $controller, Model $model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        $total_pages = ceil($this->model->get_num_of_rows()/$this->model->get_page_size());
        $cur_page = $this->model->get_current_page();
        $result = $this->model->fetch(array());
        $filter = $this->model->filter;

        ob_start();
        include 'bind_query.tpl.html';
        $output = ob_get_clean();

        return $output;
    }
}

?>
