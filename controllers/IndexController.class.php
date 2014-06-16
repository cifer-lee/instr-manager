<?php

class IndexController extends Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }
}

?>
