<?php

class InstrumentAddController extends Controller {
    private $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function perform(array $query, array $reqbody) {
        if('POST' == $_SERVER['REQUEST_METHOD']) {
            isset($reqbody['instr-id']) && $instrId = $reqbody['instr-id'];
            isset($reqbody['instr-name']) && $instrName = $reqbody['instr-name'];
            $this->model->save(array('id' => $instrId, 'name' => $instrName));
        }
    }
}

?>
