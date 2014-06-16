<?php

class InstrumentIndexController extends Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function perform(array $query, array $reqbody) {
    }
}

?>
