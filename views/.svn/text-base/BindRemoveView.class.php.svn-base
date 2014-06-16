<?php

class BindRemoveView extends View {
    private $model;
    private $controller;

    public function __construct(Controller $controller, Model $model) {
        $this->model = $model;
        $this->controller = $controller;
    }

    public function output() {
        ob_start();
        include 'bind_remove.tpl.html';
        $output = ob_get_clean();

        return $output;
    }
}

?>
