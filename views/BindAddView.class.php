<?php

class BindAddView extends View {
    private $model;
    private $controller;

    public function __construct(Controller $controller, Model $model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
        ob_start();
        include 'bind_add.tpl.html';
        $output = ob_get_clean();

        return $output;
    }
}

?>
