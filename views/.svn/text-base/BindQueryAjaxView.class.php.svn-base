<?php

class BindQueryAjaxView extends View {
    private $model;
    private $controller;

    public function __construct(Controller $controller, Model $model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        $total_pages = ceil($this->model->get_num_of_rows()/$this->model->get_page_size());
        $cur_page = $this->model->get_current_page();
        $result = $this->model->fetch(null);
        $filter = $this->model->filter;

        return json_encode($result);
    }
}

?>
